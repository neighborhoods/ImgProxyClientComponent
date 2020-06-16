<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;
    public function create(): UrlInterface
    {
        return clone $this->getImgproxyV1Url();
    }
}
