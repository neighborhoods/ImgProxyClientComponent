<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Url\Factory;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Url\FactoryInterface;

trait AwareTrait
{
    protected $ImgproxyV1UrlUrlFactory;

    public function setImgproxyV1UrlUrlFactory(FactoryInterface $UrlFactory): self
    {
        if ($this->hasImgproxyV1UrlUrlFactory()) {
            throw new \LogicException('ImgproxyV1UrlUrlFactory is already set.');
        }
        $this->ImgproxyV1UrlUrlFactory = $UrlFactory;

        return $this;
    }

    protected function getImgproxyV1UrlUrlFactory(): FactoryInterface
    {
        if (!$this->hasImgproxyV1UrlUrlFactory()) {
            throw new \LogicException('ImgproxyV1UrlUrlFactory is not set.');
        }

        return $this->ImgproxyV1UrlUrlFactory;
    }

    protected function hasImgproxyV1UrlUrlFactory(): bool
    {
        return isset($this->ImgproxyV1UrlUrlFactory);
    }

    protected function unsetImgproxyV1UrlUrlFactory(): self
    {
        if (!$this->hasImgproxyV1UrlUrlFactory()) {
            throw new \LogicException('ImgproxyV1UrlUrlFactory is not set.');
        }
        unset($this->ImgproxyV1UrlUrlFactory);

        return $this;
    }
}
