<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\UrlInterface;

trait AwareTrait
{
    protected $ImgproxyV1UrlUrl;

    public function setImgproxyV1UrlUrl(UrlInterface $Url): self
    {
        if ($this->hasImgproxyV1UrlUrl()) {
            throw new \LogicException('ImgproxyV1UrlUrl is already set.');
        }
        $this->ImgproxyV1UrlUrl = $Url;

        return $this;
    }

    protected function getImgproxyV1UrlUrl(): UrlInterface
    {
        if (!$this->hasImgproxyV1UrlUrl()) {
            throw new \LogicException('ImgproxyV1UrlUrl is not set.');
        }

        return $this->ImgproxyV1UrlUrl;
    }

    protected function hasImgproxyV1UrlUrl(): bool
    {
        return isset($this->ImgproxyV1UrlUrl);
    }

    protected function unsetImgproxyV1UrlUrl(): self
    {
        if (!$this->hasImgproxyV1UrlUrl()) {
            throw new \LogicException('ImgproxyV1UrlUrl is not set.');
        }
        unset($this->ImgproxyV1UrlUrl);

        return $this;
    }
}
