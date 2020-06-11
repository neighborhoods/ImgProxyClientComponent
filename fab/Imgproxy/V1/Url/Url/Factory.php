<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\UrlInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;
    public function create(): UrlInterface
    {
        return clone $this->getImgproxyV1UrlUrl();
    }
}
