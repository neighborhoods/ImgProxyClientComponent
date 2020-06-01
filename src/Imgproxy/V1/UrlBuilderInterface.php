<?php

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

interface UrlBuilderInterface
{
    public function build(string $imageUrl, int $width, int $height, string $fit, string $gravity, bool $enlarge = false, string $extension = null) : UrlInterface;

    public function getBaseUrl() : string;
    public function setBaseUrl(string $baseUrl) : UrlBuilderInterface;

    public function getSalt() : string;
    public function setSalt(string $salt) : UrlBuilderInterface;

    public function getKey() : string;
    public function setKey(string $key) : UrlBuilderInterface;

    public function isSecure() : bool;
}
