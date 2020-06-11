<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\UrlInterface;

interface FactoryInterface
{
    public function create(): UrlInterface;
}
