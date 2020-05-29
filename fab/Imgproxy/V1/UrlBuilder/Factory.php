<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;
    public function create(): UrlBuilderInterface
    {
        return clone $this->getImgproxyV1UrlBuilder();
    }
}
