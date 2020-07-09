<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

class Url implements UrlInterface
{
    protected $unsignedPath;
    protected $secureSignedPath;

    public function getUnsignedPath(): string
    {
        if ($this->unsignedPath === null) {
            throw new \LogicException('Url unsigned path is not set');
        }
        return $this->unsignedPath;
    }

    public function setUnsignedPath(string $unsignedPath): UrlInterface
    {
        if ($this->unsignedPath !== null) {
            throw new \LogicException('Url unsigned path is already set');
        }

        $this->unsignedPath = $unsignedPath;

        return $this;
    }

    public function getSecureSignedPath(): string
    {
        if ($this->secureSignedPath === null) {
            throw new \LogicException('Url secure signed path is not set');
        }
        return $this->secureSignedPath;
    }

    public function setSecureSignedPath(string $secureSignedPath): UrlInterface
    {
        if ($this->secureSignedPath !== null) {
            throw new \LogicException('Url secure signed path is already set');
        }

        $this->secureSignedPath = $secureSignedPath;

        return $this;
    }
}
