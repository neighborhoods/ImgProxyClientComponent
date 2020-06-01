<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

class UrlBuilder implements UrlBuilderInterface
{
    /**
     * @var string
     */
    protected $baseUrl;
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

    public function getBaseUrl(): string
    {
        if ($this->baseUrl === null) {
            throw new \LogicException('UrlBuilder base url is not set');
        }
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): UrlBuilderInterface
    {
        if ($this->baseUrl !== null) {
            throw new \LogicException('UrlBuilder base url is already set');
        }

        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function getSalt(): string
    {
        if ($this->salt === null) {
            throw new \LogicException('UrlBuilder salt is not set');
        }
        return $this->salt;
    }

    public function setSalt(string $salt): UrlBuilderInterface
    {
        if ($this->salt !== null) {
            throw new \LogicException('UrlBuilder salt is already set');
        }

        $this->salt = $salt;

        return $this;
    }

    public function getKey(): string
    {
        if ($this->key === null) {
            throw new \LogicException('UrlBuilder key is not set');
        }
        return $this->key;
    }

    public function setKey(string $key): UrlBuilderInterface
    {
        if ($this->key !== null) {
            throw new \LogicException('UrlBuilder key is already set');
        }

        $this->key = $key;

        return $this;
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
