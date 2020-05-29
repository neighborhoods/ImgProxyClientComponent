<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilder\Builder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilder\BuilderInterface;

trait AwareTrait
{
    protected $ImgproxyV1UrlBuilderBuilder;

    public function setImgproxyV1UrlBuilderBuilder(BuilderInterface $UrlBuilderBuilder): self
    {
        if ($this->hasImgproxyV1UrlBuilderBuilder()) {
            throw new \LogicException('ImgproxyV1UrlBuilderBuilder is already set.');
        }
        $this->ImgproxyV1UrlBuilderBuilder = $UrlBuilderBuilder;

        return $this;
    }

    protected function getImgproxyV1UrlBuilderBuilder(): BuilderInterface
    {
        if (!$this->hasImgproxyV1UrlBuilderBuilder()) {
            throw new \LogicException('ImgproxyV1UrlBuilderBuilder is not set.');
        }

        return $this->ImgproxyV1UrlBuilderBuilder;
    }

    protected function hasImgproxyV1UrlBuilderBuilder(): bool
    {
        return isset($this->ImgproxyV1UrlBuilderBuilder);
    }

    protected function unsetImgproxyV1UrlBuilderBuilder(): self
    {
        if (!$this->hasImgproxyV1UrlBuilderBuilder()) {
            throw new \LogicException('ImgproxyV1UrlBuilderBuilder is not set.');
        }
        unset($this->ImgproxyV1UrlBuilderBuilder);

        return $this;
    }
}
