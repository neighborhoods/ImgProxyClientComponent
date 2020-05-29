<?php

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

interface UrlInterface
{
    public function construct(UrlBuilder $builder, string $imageURL, int $width, int $height) : UrlInterface;

    public function unsignedPath() : string;

    public function insecureSignedPath(string $unsignedPath) : string;

    public function secureSignedPath(string $unsignedPath) : string;

    public function signedPath() : string;

    public function toString() : string;

    public function setWidth(int $width) : UrlInterface;

    public function setHeight(int $height) : UrlInterface;

    public function setFit(string $fit) : UrlInterface;

    public function setGravity(string $gravity) : UrlInterface;

    public function setEnlarge(bool $enlarge) : UrlInterface;

    public function setExtension(string $extension) : UrlInterface;

    public function resolveExtension() : string;
}
