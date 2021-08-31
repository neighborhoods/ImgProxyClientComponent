<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponentTest\Unit\Imgproxy\V1;

use PHPUnit\Framework\TestCase;
use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url;
use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Gravity;
use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Fit;

class SignImageTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBuildExampleSignedImage()
    {
        $urlBuilder = new Url\Builder();
        $imgproxyV1UrlFactory = new Url\Factory();
        $imgproxyV1UrlFactory->setImgproxyV1Url(new Url());

        $urlBuilder->setSalt('520f986b998545b4785e0defbc4f3c1203f22de2374a3d53cb7a7fe9fea309c5')
            ->setKey('943b421c9eb07c830af81030552c86009268de4e532ba2ee2eab8247c6da0881')
            ->setImageUrl('http://img.example.com/pretty/image.jpg')
            ->setFit(Fit::FILL)
            ->setGravity(Gravity::NORTH)
            ->setEnlarge(true)
            ->setExtension('png')
            ->setHeight(300)
            ->setWidth(300);

        $url = $urlBuilder->setImgproxyV1UrlFactory($imgproxyV1UrlFactory)->build();

        $this->assertEquals(
            '/_PQ4ytCQMMp-1w1m_vP6g8Qb-Q7yF9mwghf6PddqxLw/fill/300/300/no/1/aHR0cDovL2ltZy5leGFtcGxlLmNvbS9wcmV0dHkvaW1hZ2UuanBn.png',
            $url->getSecureSignedPath()
        );
    }
}
