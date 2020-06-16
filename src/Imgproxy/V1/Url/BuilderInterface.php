<?php
declare(strict_types=1);

namespace Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\Url;

use Neighborhoods\ImgProxyClientComponent\Imgproxy\V1\UrlInterface;

interface BuilderInterface
{
    public function build(): UrlInterface;

    public function unsignedPath(): string;

    public function secureSignedPath(string $unsignedPath): string;

    public function getWidth(): int;
    public function setWidth(int $width): BuilderInterface;

    public function getImageUrl(): string;
    public function setImageUrl(string $imageUrl): BuilderInterface;

    public function getHeight(): int;
    public function setHeight(int $height): BuilderInterface;

    public function getFit(): string;
    public function setFit(string $fit): BuilderInterface;

    public function getGravity(): string;
    public function setGravity(string $gravity): BuilderInterface;

    public function getEnlarge(): bool;
    public function setEnlarge(bool $enlarge): BuilderInterface;

    public function getExtension(): string;
    public function setExtension(string $extension): BuilderInterface;

    public function getSalt(): string;
    public function setSalt(string $salt): BuilderInterface;

    public function getKey(): string;
    public function setKey(string $key): BuilderInterface;

    public function resolveExtension(): string;
}
