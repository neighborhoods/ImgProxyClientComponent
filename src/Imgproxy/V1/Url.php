<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

class Url implements UrlInterface
{

    /**
     * @var string
     */
    private $imageUrl;
    /**
     * @var int
     */
    private $width;
    /**
     * @var int
     */
    private $height;
    /**
     * @var string
     */
    private $fit;
    /**
     * @var string
     */
    private $gravity;
    /**
     * @var bool
     */
    private $enlarge;
    /**
     * @var string|null
     */
    private $extension;
    /**
     * @var UrlBuilder
     */
    private $builder;

    public function construct(UrlBuilder $builder, string $imageURL, int $width, int $height): UrlInterface
    {
        $this->builder = $builder;
        $this->imageUrl = $imageURL;
        $this->width = $width;
        $this->height = $height;
    }

    public function unsignedPath(): string
    {
        $enlarge = (string)(int)$this->enlarge;
        $encodedUrl = rtrim(strtr(base64_encode($this->imageUrl), '+/', '-_'), '=');
        $ext = $this->extension ?: $this->resolveExtension();
        return "/{$this->fit}/{$this->width}/{$this->height}/{$this->gravity}/{$enlarge}/{$encodedUrl}" . ($ext ? ".$ext" : "");
    }

    public function insecureSignedPath(string $unsignedPath): string
    {
        return "/insecure$unsignedPath";
    }

    public function secureSignedPath(string $unsignedPath): string
    {
        $data = $this->builder->getSalt() . $unsignedPath;
        $sha256 = hash_hmac('sha256', $data, $this->builder->getKey(), true);
        $sha256Encoded = base64_encode($sha256);
        $signature = str_replace(["+", "/", "="], ["-", "_", ""], $sha256Encoded);;
        return "/{$signature}{$unsignedPath}";
    }

    public function signedPath(): string
    {
        $unsignedPath = $this->unsignedPath();
        $result = $this->builder->isSecure() ? $this->secureSignedPath($unsignedPath) : $this->insecureSignedPath($unsignedPath);
        return $result;
    }

    public function toString(): string
    {
        return $this->builder->getBaseUrl() . $this->signedPath();
    }

    public function setWidth(int $width): UrlInterface
    {
        if ($this->width !== null) {
            throw new \LogicException('Url width is already set.');
        }
        $this->width = $width;
        return $this;
    }

    public function setHeight(int $height): UrlInterface
    {
        if ($this->height !== null) {
            throw new \LogicException('Url height is already set');
        }
        $this->height = $height;
        return $this;
    }

    public function setFit(string $fit): UrlInterface
    {
        if ($this->fit !== null) {
            throw new \LogicException('Url fit is already set');
        }
        $this->fit = $fit;
        return $this;
    }

    public function setGravity(string $gravity): UrlInterface
    {
        if ($this->gravity !== null) {
            throw new \LogicException('Url gravity is already set');
        }
        $this->gravity = $gravity;
        return $this;
    }

    public function setEnlarge(bool $enlarge): UrlInterface
    {
        if ($this->enlarge !== null) {
            throw new \LogicException('Url enlarge is already set');
        }
        $this->enlarge = $enlarge;
        return $this;
    }

    public function setExtension(string $extension): UrlInterface
    {
        if ($this->extension !== null) {
            throw new \LogicException('Url extension is already set');
        }
        $this->extension = $extension;
        return $this;
    }

    public function resolveExtension(): string
    {
        if ("local://" === substr($this->imageUrl, 0, 8)) {
            $path = substr($this->imageUrl, 8);
        } else {
            $path = parse_url($this->imageUrl, PHP_URL_PATH);
        }

        $ext = $path ? pathinfo($path, PATHINFO_EXTENSION) : "";
        return $ext ?: "";
    }
}
