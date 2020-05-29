<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

class UrlBuilder implements UrlBuilderInterface
{
    /**
     * @var string
     */
    private $baseUrl;
    /**
     * @var string
     */
    private $salt;
    /**
     * @var string
     */
    private $key;
    /**
     * @var bool
     */
    private $secure;

    public function construct(string $baseUrl, string $key = null, string $salt = null): UrlBuilderInterface
    {
        if ($key && $salt) {
            $this->key = pack("H*" , $key) ?: $this->throwException("Key expected to be hex-encoded string");
            $this->salt = pack("H*" , $salt) ?: $this->throwException("Salt expected to be hex-encoded string");
            $this->secure = true;
        }

        $this->baseUrl = $baseUrl;
    }

    public function build(
        string $imageUrl,
        int $width,
        int $height,
        string $fit,
        string $gravity,
        bool $enlarge = false,
        string $extension = null
    ): UrlInterface {
        return (new Url($this, $imageUrl, $width, $height))
            ->setFit($fit)
            ->setGravity($gravity)
            ->setEnlarge($enlarge)
            ->setExtension($extension);
    }

    public function getBaseUrl(): string
    {
        if ($this->baseUrl === null) {
            throw new \LogicException('UrlBuilder base url is not set');
        }
        return $this->baseUrl;
    }

    public function getSalt(): string
    {
        if ($this->salt === null) {
            throw new \LogicException('UrlBuilder salt is not set');
        }
        return $this->salt;
    }

    public function getKey(): string
    {
        if ($this->key === null) {
            throw new \LogicException('UrlBuilder key is not set');
        }
        return $this->key;
    }

    public function isSecure(): bool
    {
        if ($this->secure === null) {
            throw new \LogicException('UrlBuilder secure is not set');
        }
        return $this->secure;
    }

    private function throwException(string $message)
    {
        throw new Exception($message);
    }
}
