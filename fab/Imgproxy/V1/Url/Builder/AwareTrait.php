<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Builder;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\BuilderInterface;

trait AwareTrait
{
    protected $ImgproxyV1UrlBuilder;

    public function setImgproxyV1UrlBuilder(BuilderInterface $UrlBuilder): self
    {
        if ($this->hasImgproxyV1UrlBuilder()) {
            throw new \LogicException('ImgproxyV1UrlBuilder is already set.');
        }
        $this->ImgproxyV1UrlBuilder = $UrlBuilder;

        return $this;
    }

    protected function getImgproxyV1UrlBuilder(): BuilderInterface
    {
        if (!$this->hasImgproxyV1UrlBuilder()) {
            throw new \LogicException('ImgproxyV1UrlBuilder is not set.');
        }

        return $this->ImgproxyV1UrlBuilder;
    }

    protected function hasImgproxyV1UrlBuilder(): bool
    {
        return isset($this->ImgproxyV1UrlBuilder);
    }

    protected function unsetImgproxyV1UrlBuilder(): self
    {
        if (!$this->hasImgproxyV1UrlBuilder()) {
            throw new \LogicException('ImgproxyV1UrlBuilder is not set.');
        }
        unset($this->ImgproxyV1UrlBuilder);

        return $this;
    }
}
