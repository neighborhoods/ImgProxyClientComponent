<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\UrlInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): UrlInterface
    {
        $Url = $this->getImgproxyV1UrlUrlFactory()->create();

        $record = $this->getRecord();



        return $Url;
    }

    public function buildForInsert(): UrlInterface
    {
        $Url = $this->getImgproxyV1UrlUrlFactory()->create();

        $record = $this->getRecord();



        return $Url;
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
