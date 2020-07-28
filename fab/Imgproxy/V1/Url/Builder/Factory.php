<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Builder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getImgproxyV1UrlBuilder();
    }
}
