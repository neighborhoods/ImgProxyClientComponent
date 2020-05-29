<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilder\Factory;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlBuilder\FactoryInterface;

trait AwareTrait
{
    protected $ImgproxyV1UrlBuilderFactory;

    public function setImgproxyV1UrlBuilderFactory(FactoryInterface $UrlBuilderFactory): self
    {
        if ($this->hasImgproxyV1UrlBuilderFactory()) {
            throw new \LogicException('ImgproxyV1UrlBuilderFactory is already set.');
        }
        $this->ImgproxyV1UrlBuilderFactory = $UrlBuilderFactory;

        return $this;
    }

    protected function getImgproxyV1UrlBuilderFactory(): FactoryInterface
    {
        if (!$this->hasImgproxyV1UrlBuilderFactory()) {
            throw new \LogicException('ImgproxyV1UrlBuilderFactory is not set.');
        }

        return $this->ImgproxyV1UrlBuilderFactory;
    }

    protected function hasImgproxyV1UrlBuilderFactory(): bool
    {
        return isset($this->ImgproxyV1UrlBuilderFactory);
    }

    protected function unsetImgproxyV1UrlBuilderFactory(): self
    {
        if (!$this->hasImgproxyV1UrlBuilderFactory()) {
            throw new \LogicException('ImgproxyV1UrlBuilderFactory is not set.');
        }
        unset($this->ImgproxyV1UrlBuilderFactory);

        return $this;
    }
}
