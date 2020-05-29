<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Factory;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\FactoryInterface;

trait AwareTrait
{
    protected $ImgproxyV1UrlFactory;

    public function setImgproxyV1UrlFactory(FactoryInterface $UrlFactory): self
    {
        if ($this->hasImgproxyV1UrlFactory()) {
            throw new \LogicException('ImgproxyV1UrlFactory is already set.');
        }
        $this->ImgproxyV1UrlFactory = $UrlFactory;

        return $this;
    }

    protected function getImgproxyV1UrlFactory(): FactoryInterface
    {
        if (!$this->hasImgproxyV1UrlFactory()) {
            throw new \LogicException('ImgproxyV1UrlFactory is not set.');
        }

        return $this->ImgproxyV1UrlFactory;
    }

    protected function hasImgproxyV1UrlFactory(): bool
    {
        return isset($this->ImgproxyV1UrlFactory);
    }

    protected function unsetImgproxyV1UrlFactory(): self
    {
        if (!$this->hasImgproxyV1UrlFactory()) {
            throw new \LogicException('ImgproxyV1UrlFactory is not set.');
        }
        unset($this->ImgproxyV1UrlFactory);

        return $this;
    }
}
