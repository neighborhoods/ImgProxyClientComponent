<?php

declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponentTest\Unit\Imgproxy\V1;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Gravity;
use PHPUnit\Framework\TestCase;

class GravityTest extends TestCase
{
    /**
     * @dataProvider focusPointDataProvider
     */
    public function testValidFocusPoint(float $x, float $y, bool $valid, ?string $expected): void
    {
        if ($valid) {
            $this->assertEquals($expected, Gravity::focusPoint($x, $y));
        } else {
            $this->expectException(\InvalidArgumentException::class);
            Gravity::focusPoint($x, $y);
        }
    }

    public function focusPointDataProvider(): array
    {
        return [
            [0.5, 0.5, true, 'fp:0.500000:0.500000'],
            [0.0, 0.0, true, 'fp:0.000000:0.000000'],
            [1.0, 1.0, true, 'fp:1.000000:1.000000'],
            [-0.1, 0.5, false, null],
            [1.1, 0.5, false, null],
            [0.5, -0.5, false, null],
            [0.5, 1.1, false, null],
            [-0.5, -0.5, false, null],
            [-0.5, 1.1, false, null],
            [1.1, -0.5, false, null],
            [1.1, 1.1, false, null],

        ];
    }
}
