<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1;

/**
 * @link https://docs.imgproxy.net/#/generating_the_url_basic?id=gravity
 *
 * When imgproxy needs to cut some parts of the image, it is guided by the gravity. The following values are supported:
 */
final class Gravity
{
    /**
     * north (top edge)
     */
    public const NORTH = 'no';

    /**
     * south (bottom edge)
     */
    public const SOUTH = 'so';

    /**
     * east (right edge)
     */
    public const EAST = 'ea';

    /**
     * west (left edge)
     */
    public const WEST = 'we';

    /**
     * north-east (top-right corner)
     */
    public const NORTH_EAST = 'noea';

    /**
     * north-west (top-left corner)
     */
    public const NORTH_WEST = 'nowe';

    /**
     * south-east (bottom-right corner)
     */
    public const SOUTH_EAST = 'soea';

    /**
     * south-west (bottom-left corner)
     */
    public const SOUTH_WEST = 'sowe';

    /**
     * center
     */
    public const CENTER = 'ce';

    /**
     * smart.
     * libvips detects the most “interesting” section of the image and considers it as the center of the resulting image
     */
    public const SMART = 'sm';

    /**
     * focus point.
     * x and y are floating point numbers between 0 and 1 that describe the coordinates of the center of the resulting
     * image. Treat 0 and 1 as right/left for x and top/bottom for y.
     */
    public static function focusPoint(float $x, float $y): string
    {
        if ($x < 0 || $x > 1 || $y < 0 || $y > 1) {
            throw new \InvalidArgumentException("FocusPoint Coordinates ($x, $y) must be between 0 and 1.");
        }
        return sprintf('fp:%f:%f', $x, $y);
    }
}
