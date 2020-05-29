<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilderInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): UrlBuilderInterface
    {
        $UrlBuilder = $this->getImgproxyV1UrlBuilderFactory()->create();

        $record = $this->getRecord();



        return $UrlBuilder;
    }

    public function buildForInsert(): UrlBuilderInterface
    {
        $UrlBuilder = $this->getImgproxyV1UrlBuilderFactory()->create();

        $record = $this->getRecord();



        return $UrlBuilder;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new \LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new \LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
