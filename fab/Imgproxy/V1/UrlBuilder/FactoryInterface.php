<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilderInterface;

interface FactoryInterface
{
    public function create(): UrlBuilderInterface;
}
