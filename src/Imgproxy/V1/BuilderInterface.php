<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlInterface;

interface BuilderInterface
{
    public function build(): UrlInterface;

    public function buildForInsert(): UrlInterface;

    public function setRecord(array $record): BuilderInterface;
}
