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
     * @var string
     */
    protected $salt;
    /**
     * @var string
     */
    protected $key;
    /**
     * @var bool
     */
    protected $secure;


    public function unsignedPath(): string
    {
        $enlarge = (string)(int)$this->getEnlarge();
        $encodedUrl = rtrim(strtr(base64_encode($this->getImageUrl()), '+/', '-_'), '=');
        $ext = $this->getExtension() ?: $this->resolveExtension();
        return "/{$this->getFit()}/{$this->getWidth()}/{$this->getHeight()}/{$this->getGravity()}/{$enlarge}/{$encodedUrl}" . ($ext ? ".$ext" : "");
    }

    public function insecureSignedPath(string $unsignedPath): string
    {
        return "/insecure$unsignedPath";
    }

    public function secureSignedPath(string $unsignedPath): string
    {
        $data = $this->getSalt() . $unsignedPath;
        $sha256 = hash_hmac('sha256', $data, $this->getKey(), true);
        $sha256Encoded = base64_encode($sha256);
        $signature = str_replace(["+", "/", "="], ["-", "_", ""], $sha256Encoded);;
        return "/{$signature}{$unsignedPath}";
    }

    public function signedPath(): string
    {
        $unsignedPath = $this->unsignedPath();
        return $this->isSecure() ? $this->secureSignedPath($unsignedPath) : $this->insecureSignedPath($unsignedPath);
    }

    public function toString(): string
    {
        return $this->getImageUrl() . $this->signedPath();
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        if ($this->imageUrl === null) {
            throw new \LogicException("Url image url has not been set");
        }

        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     * @return UrlInterface
     */
    public function setImageUrl(string $imageUrl): UrlInterface
    {
        if ($this->imageUrl !== null) {
            throw new \LogicException("Url image url is already set");
        }

        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWidth(): int
    {
        if ($this->width === null) {
            throw new \LogicException("Url width has not been set");
        }

        return $this->width;
    }

    /**
     * @param mixed $width
     * @return UrlInterface
     */
    public function setWidth(int $width): UrlInterface
    {
        if ($this->width !== null) {
            throw new \LogicException("Url width is already set.");
        }

        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        if ($this->height === null) {
            throw new \LogicException("Url height has not been set");
        }

        return $this->height;
    }

    /**
     * @param int $height
     * @return UrlInterface
     */
    public function setHeight(int $height): UrlInterface
    {
        if ($this->height !== null) {
            throw new \LogicException("Url height is already set");
        }

        $this->height = $height;

        return $this;
    }

    /**
     * @return string
     */
    public function getFit(): string
    {
        if ($this->fit === null) {
            throw new \LogicException("Url fit has not been set");
        }

        return $this->fit;
    }

    /**
     * @param string $fit
     * @return UrlInterface
     */
    public function setFit(string $fit): UrlInterface
    {
        if ($this->fit !== null) {
            throw new \LogicException('Url fit is already set');
        }

        $this->fit = $fit;

        return $this;
    }

    /**
     * @return string
     */
    public function getGravity(): string
    {
        if ($this->gravity === null) {
            throw new \LogicException("Url gravity has not been set");
        }

        return $this->gravity;
    }

    /**
     * @param string $gravity
     * @return UrlInterface
     */
    public function setGravity(string $gravity): UrlInterface
    {
        if ($this->gravity !== null) {
            throw new \LogicException("Url gravity is already set");
        }

        $this->gravity = $gravity;

        return $this;
    }

    /**
     * @return bool
     */
    public function getEnlarge(): bool
    {
        if ($this->enlarge === null) {
            throw new \LogicException("Url enlarge has not been set");
        }

        return $this->enlarge;
    }

    /**
     * @param bool $enlarge
     * @return UrlInterface
     */
    public function setEnlarge(bool $enlarge): UrlInterface
    {
        if ($this->enlarge !== null) {
            throw new \LogicException("Url enlarge is already set");
        }

        $this->enlarge = $enlarge;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExtension(): string
    {
        if ($this->extension === null) {
            throw new \LogicException("Url extension has not been set");
        }

        return $this->extension;
    }

    /**
     * @param string|null $extension
     * @return UrlInterface
     */
    public function setExtension(string $extension): UrlInterface
    {
        if ($this->extension !== null) {
            throw new \LogicException("Url extension is already set");
        }
        $this->extension = $extension;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        if ($this->salt === null) {
            throw new \LogicException('Url salt is not set');
        }
        return $this->salt;
    }

    /**
     * @param string $salt
     * @return UrlInterface
     */
    public function setSalt(string $salt): UrlInterface
    {
        if ($this->salt !== null) {
            throw new \LogicException('Url salt is already set');
        }

        $this->salt = $salt;

        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        if ($this->key === null) {
            throw new \LogicException('Url key is not set');
        }
        return $this->key;
    }

    /**
     * @param string $key
     * @return UrlInterface
     */
    public function setKey(string $key): UrlInterface
    {
        if ($this->key !== null) {
            throw new \LogicException('Url key is already set');
        }

        $this->key = $key;

        return $this;
    }

    /**
     * @return bool
     */
    public function getSecure(): bool
    {
        if ($this->secure === null) {
            throw new \LogicException('Url secure is not set');
        }
        return $this->secure;
    }

    /**
     * @param bool $secure
     * @return UrlInterface
     */
    public function setSecure(bool $secure): UrlInterface
    {
        if ($this->secure !== null) {
            throw new \LogicException('Url secure is not set');
        }
        $this->secure = $secure;

        return $this;
    }


    public function resolveExtension(): string
    {
        if ("local://" === substr($this->getImageUrl(), 0, 8)) {
            $path = substr($this->getImageUrl(), 8);
        } else {
            $path = parse_url($this->getImageUrl(), PHP_URL_PATH);
        }

        $ext = $path ? pathinfo($path, PATHINFO_EXTENSION) : "";
        return $ext ?: "";
    }
}
