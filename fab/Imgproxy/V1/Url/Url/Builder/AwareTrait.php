<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Url\Builder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Url\BuilderInterface;

trait AwareTrait
{
    protected $ImgproxyV1UrlUrlBuilder;

    public function setImgproxyV1UrlUrlBuilder(BuilderInterface $UrlBuilder): self
    {
        if ($this->hasImgproxyV1UrlUrlBuilder()) {
            throw new \LogicException('ImgproxyV1UrlUrlBuilder is already set.');
        }
        $this->ImgproxyV1UrlUrlBuilder = $UrlBuilder;

        return $this;
    }

    protected function getImgproxyV1UrlUrlBuilder(): BuilderInterface
    {
        if (!$this->hasImgproxyV1UrlUrlBuilder()) {
            throw new \LogicException('ImgproxyV1UrlUrlBuilder is not set.');
        }

        return $this->ImgproxyV1UrlUrlBuilder;
    }

    protected function hasImgproxyV1UrlUrlBuilder(): bool
    {
        return isset($this->ImgproxyV1UrlUrlBuilder);
    }

    protected function unsetImgproxyV1UrlUrlBuilder(): self
    {
        if (!$this->hasImgproxyV1UrlUrlBuilder()) {
            throw new \LogicException('ImgproxyV1UrlUrlBuilder is not set.');
        }
        unset($this->ImgproxyV1UrlUrlBuilder);

        return $this;
    }
}
