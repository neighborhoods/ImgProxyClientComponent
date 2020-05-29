<?php

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

interface UrlBuilderInterface
{
    public function construct(string $baseUrl, string $key = null, string $salt = null) : UrlBuilderInterface;

    public function build(string $imageUrl, int $width, int $height, string $fit, string $gravity, bool $enlarge = false, string $extension = null) : UrlInterface;

    public function getBaseUrl() : string;

    public function getSalt() : string;

    public function getKey() : string;

    public function isSecure() : bool;
}
