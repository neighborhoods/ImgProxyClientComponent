<?php

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

interface UrlInterface
{
    public function unsignedPath() : string;

    public function insecureSignedPath(string $unsignedPath) : string;

    public function secureSignedPath(string $unsignedPath) : string;

    public function signedPath() : string;

    public function toString() : string;

    public function getImageUrl() : string;
    public function setImageUrl(string $imageUrl) : UrlInterface;

    public function getBuilder() : UrlBuilder;
    public function setBuilder(UrlBuilder $builder) : UrlInterface;

    public function getWidth() : int;
    public function setWidth(int $width) : UrlInterface;

    public function getHeight() : int;
    public function setHeight(int $height) : UrlInterface;

    public function getFit() : string;
    public function setFit(string $fit) : UrlInterface;

    public function getGravity() : string;
    public function setGravity(string $gravity) : UrlInterface;

    public function getEnlarge() : bool;
    public function setEnlarge(bool $enlarge) : UrlInterface;

    public function getExtension() : string;
    public function setExtension(string $extension) : UrlInterface;

    public function resolveExtension() : string;
}
