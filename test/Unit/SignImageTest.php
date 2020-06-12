<?php

use PHPUnit\Framework\TestCase;
//use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url;
use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Builder;

class SignImageTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBuildSignedImage()
    {
        $urlBuilder = new Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Builder();
        $imgproxyV1UrlFactory = new \Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url\Factory();
        $imgproxyV1UrlFactory->setImgproxyV1Url(new \Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url());

        $urlBuilder->setSalt('Fake Salt')
            ->setKey('Fake Key')
            ->setSecure(true)
            ->setImageUrl('https://nhds-cms-service-prod.s3.amazonaws.com/career-page/private/1.jpg')
            ->setFit('fit')
            ->setGravity('sm')
            ->setEnlarge(false)
            ->setExtension('null')
            ->setHeight(200)
            ->setWidth(300);

        $url = $urlBuilder->setImgproxyV1UrlFactory($imgproxyV1UrlFactory)->build();

        $this->assertEquals('/0MBh4uk0iRF0HyMbHZlaZXY_RbnWC-g1QIKu-WYPz6s/fit/300/200/sm/0/aHR0cHM6Ly9uaGRzLWNtcy1zZXJ2aWNlLXByb2QuczMuYW1hem9uYXdzLmNvbS9jYXJlZXItcGFnZS9wcml2YXRlLzEuanBn.null', $url->getSecureSignedPath());
    }
}
