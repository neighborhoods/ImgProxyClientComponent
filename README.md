# ImgProxyClientComponent

A Client Component to interact with `Imgproxy`

`Imgproxy` is a fast and secure standalone server for resizing and converting remote images

[Imgproxy Github Page](https://github.com/imgproxy/imgproxy)

[Imgproxy Documentation](https://docs.imgproxy.net/#/)

## Install

Via Composer

``` bash
$ composer require neighborhoods/imgproxy-client-component
```

## Usage

The basic URL should contain the signature, resize parameters, and source URL, like this:

```
/%signature/%resizing_type/%width/%height/%gravity/%enlarge/plain/%source_url@%extension
/%signature/%resizing_type/%width/%height/%gravity/%enlarge/%encoded_source_url.%extension
```

Basic Documention for each field 
- [Enlarge](https://docs.imgproxy.net/#/generating_the_url_basic?id=enlarge)
- [Fit](https://docs.imgproxy.net/#/generating_the_url_basic?id=resizing-types)
- [Width & Height](https://docs.imgproxy.net/#/generating_the_url_basic?id=width-and-height)
- [Gravity](https://docs.imgproxy.net/#/generating_the_url_basic?id=gravity)
- [Salt & Key](https://docs.imgproxy.net/#/configuration?id=url-signature)

``` php
<?php

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url

    protected $imgproxyUrl;
    protected $key;
    protected $salt;

    protected function buildSecureSignedPath(string $image) : string
    {
        $urlBuilder = $this->getImgproxyV1UrlBuilderFactory()->create();

        $urlBuilder
            ->setImageUrl(https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/SpaceX_Starship_SN8_launch_as_viewed_from_South_Padre_Island.jpg/220px-SpaceX_Starship_SN8_launch_as_viewed_from_South_Padre_Island.jpg)
            ->setEnlarge(false)
            ->setFit('fill')
            ->setWidth(0)
            ->setHeight(0)
            ->setGravity('ce:0:0')
            ->setKey($this->getKey())
            ->setSalt($this->getSalt());

        $url = $urlBuilder->build();

        return $this->getImgproxyUrl() . $url->getSecureSignedPath();
    }
    
        public function setKey(string $imgproxyKey) : SenderInterface
    {
        if (null !== $this->key) {
            throw new \LogicException(
                'Sender key is already set.'
            );
        }

        $this->key = $imgproxyKey;

        return $this;
    }

    protected function getKey() : string
    {
        if (null === $this->key) {
            throw new \LogicException(
                'Sender key has not been set.'
            );
        }
        return $this->key;
    }

    public function setSalt(string $imgproxySalt) : SenderInterface
    {
        if (null !== $this->salt) {
            throw new \LogicException(
                'Sender salt is already set.'
            );
        }

        $this->salt = $imgproxySalt;

        return $this;
    }

    protected function getSalt() : string
    {
        if (null === $this->salt) {
            throw new \LogicException(
                'Sender salt has not been set.'
            );
        }
        return $this->salt;
    }

    public function setImgproxyUrl(string $imgproxyUrl) : SenderInterface
    {
        if (null !== $this->imgproxyUrl) {
            throw new \LogicException(
                'Sender imgproxy url is already set.'
            );
        }

        $this->imgproxyUrl = $imgproxyUrl;

        return $this;
    }

    protected function getImgproxyUrl() : string
    {
        if (null === $this->imgproxyUrl) {
            throw new \LogicException(
                'Sender imgproxy url has not been set'
            );
        }
        return $this->imgproxyUrl;
    }
```
