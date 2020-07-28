<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Builder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
