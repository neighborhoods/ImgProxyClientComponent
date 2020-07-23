<?php

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

interface UrlInterface
{
    public function getUnsignedPath(): string;
    public function setUnsignedPath(string $unsignedPath): UrlInterface;

    public function getSecureSignedPath(): string;
    public function setSecureSignedPath(string $secureSignedPath): UrlInterface;
}
