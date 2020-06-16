<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlInterface;

trait AwareTrait
{
    protected $ImgproxyV1Url;

    public function setImgproxyV1Url(UrlInterface $Url): self
    {
        if ($this->hasImgproxyV1Url()) {
            throw new \LogicException('ImgproxyV1Url is already set.');
        }
        $this->ImgproxyV1Url = $Url;

        return $this;
    }

    protected function getImgproxyV1Url(): UrlInterface
    {
        if (!$this->hasImgproxyV1Url()) {
            throw new \LogicException('ImgproxyV1Url is not set.');
        }

        return $this->ImgproxyV1Url;
    }

    protected function hasImgproxyV1Url(): bool
    {
        return isset($this->ImgproxyV1Url);
    }

    protected function unsetImgproxyV1Url(): self
    {
        if (!$this->hasImgproxyV1Url()) {
            throw new \LogicException('ImgproxyV1Url is not set.');
        }
        unset($this->ImgproxyV1Url);

        return $this;
    }
}
