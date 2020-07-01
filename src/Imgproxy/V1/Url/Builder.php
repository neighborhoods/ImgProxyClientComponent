<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

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

    public function build(): UrlInterface
    {
        $Url = $this->getImgproxyV1UrlFactory()->create();

        $unsignedPath = $this->buildUnsignedPath();
        $secureSignedPath = $this->buildSecureSignedPath($unsignedPath);
        $Url->setUnsignedPath($unsignedPath)
            ->setSecureSignedPath($secureSignedPath);

        return $Url;
    }

    protected function buildUnsignedPath(): string
    {
        $enlarge = (string)(int)$this->getEnlarge();
        $encodedUrl = rtrim(strtr(base64_encode($this->getImageUrl()), '+/', '-_'), '=');

        $fit = $this->getFit();
        $width = $this->getWidth();
        $height = $this->getHeight();
        $gravity = $this->getGravity();

        $unsignedPath = "/$fit/$width/$height/$gravity/$enlarge/$encodedUrl";

        if ($this->hasExtension()) {
            $urlExtension = $this->getExtension();
            $unsignedPath = $unsignedPath . ".$urlExtension";
        }

        return $unsignedPath;
    }

    protected function buildSecureSignedPath(string $unsignedPath): string
    {
        $data = $this->getSalt() . $unsignedPath;
        $sha256 = hash_hmac('sha256', $data, $this->getKey(), true);
        $sha256Encoded = base64_encode($sha256);
        $signature = str_replace(["+", "/", "="], ["-", "_", ""], $sha256Encoded);;
        return "/{$signature}{$unsignedPath}";
    }

    public function getWidth(): int
    {
        if ($this->width === null) {
            throw new \LogicException("Url width has not been set");
        }

        return $this->width;
    }

    public function setWidth(int $width): BuilderInterface
    {
        if ($this->width !== null) {
            throw new \LogicException("Url width is already set.");
        }

        $this->width = $width;

        return $this;
    }

    public function getImageUrl(): string
    {
        if ($this->imageUrl === null) {
            throw new \LogicException("Url image url has not been set");
        }

        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): BuilderInterface
    {
        if ($this->imageUrl !== null) {
            throw new \LogicException("Url image url is already set");
        }

        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getHeight(): int
    {
        if ($this->height === null) {
            throw new \LogicException("Url height has not been set");
        }

        return $this->height;
    }

    public function setHeight(int $height): BuilderInterface
    {
        if ($this->height !== null) {
            throw new \LogicException("Url height is already set");
        }

        $this->height = $height;

        return $this;
    }

    public function getFit(): string
    {
        if ($this->fit === null) {
            throw new \LogicException("Url fit has not been set");
        }

        return $this->fit;
    }

    public function setFit(string $fit): BuilderInterface
    {
        if ($this->fit !== null) {
            throw new \LogicException('Url fit is already set');
        }

        $this->fit = $fit;

        return $this;
    }

    public function getGravity(): string
    {
        if ($this->gravity === null) {
            throw new \LogicException("Url gravity has not been set");
        }

        return $this->gravity;
    }

    public function setGravity(string $gravity): BuilderInterface
    {
        if ($this->gravity !== null) {
            throw new \LogicException("Url gravity is already set");
        }

        $this->gravity = $gravity;

        return $this;
    }

    public function getEnlarge(): bool
    {
        if ($this->enlarge === null) {
            throw new \LogicException("Url enlarge has not been set");
        }

        return $this->enlarge;
    }

    public function setEnlarge(bool $enlarge): BuilderInterface
    {
        if ($this->enlarge !== null) {
            throw new \LogicException("Url enlarge is already set");
        }

        $this->enlarge = $enlarge;

        return $this;
    }

    public function getExtension(): string
    {
        if ($this->extension === null) {
            throw new \LogicException("Url extension has not been set");
        }

        return $this->extension;
    }

    public function hasExtension(): bool
    {
        return $this->extension !== null;
    }

    public function setExtension(?string $extension): BuilderInterface
    {
        if ($this->extension !== null) {
            throw new \LogicException("Url extension is already set");
        }
        $this->extension = $extension;
        return $this;
    }

    public function getSalt(): string
    {
        if ($this->salt === null) {
            throw new \LogicException('Url salt is not set');
        }
        return $this->salt;
    }

    public function setSalt(string $salt): BuilderInterface
    {
        if ($this->salt !== null) {
            throw new \LogicException('Url salt is already set');
        }

        $this->salt = $salt;

        return $this;
    }

    public function getKey(): string
    {
        if ($this->key === null) {
            throw new \LogicException('Url key is not set');
        }
        return $this->key;
    }

    public function setKey(string $key): BuilderInterface
    {
        if ($this->key !== null) {
            throw new \LogicException('Url key is already set');
        }

        $this->key = $key;

        return $this;
    }
}
