<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

class Url implements UrlInterface
{
    /**
     * @var string
     */
    protected $unsignedPath;
    /**
     * @var string
     */
    protected $secureSignedPath;

    /**
     * @return string
     */
    public function getUnsignedPath(): string
    {
        if ($this->unsignedPath === null) {
            throw new \LogicException('Url unsigned path is not set');
        }
        return $this->unsignedPath;
    }

    /**
     * @param string $unsignedPath
     * @return UrlInterface
     */
    public function setUnsignedPath(string $unsignedPath): UrlInterface
    {
        if ($this->unsignedPath !== null) {
            throw new \LogicException('Url unsigned path is already set');
        }

        $this->unsignedPath = $unsignedPath;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecureSignedPath(): string
    {
        if ($this->secureSignedPath === null) {
            throw new \LogicException('Url secure signed path is not set');
        }
        return $this->secureSignedPath;
    }

    /**
     * @param string $secureSignedPath
     * @return UrlInterface
     */
    public function setSecureSignedPath(string $secureSignedPath): UrlInterface
    {
        if ($this->secureSignedPath !== null) {
            throw new \LogicException('Url secure signed path is already set');
        }

        $this->secureSignedPath = $secureSignedPath;

        return $this;
    }


}
