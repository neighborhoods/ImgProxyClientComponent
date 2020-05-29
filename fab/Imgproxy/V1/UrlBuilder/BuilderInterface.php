<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilderInterface;

interface BuilderInterface
{
    public function build(): UrlBuilderInterface;

    public function buildForInsert(): UrlBuilderInterface;

    public function setRecord(array $record): BuilderInterface;
}
