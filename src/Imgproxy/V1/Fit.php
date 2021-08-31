<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

/**
 * @link https://docs.imgproxy.net/#/generating_the_url_basic?id=resizing-types
 *
 * imgproxy supports the following resizing types
 */
final class Fit
{
    /**
     * resizes the image while keeping aspect ratio to fit given size
     */
    public const FIT = 'fit';

    /**
     * resizes the image while keeping aspect ratio to fill given size and cropping projecting parts
     */
    public const FILL = 'fill';

    /**
     * if both source and resulting dimensions have the same orientation (portrait or landscape),
     * imgproxy will use fill. Otherwise, it will use fit.
     */
    public const AUTO = 'auto';
}
