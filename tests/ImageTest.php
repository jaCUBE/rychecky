<?php


use PHPUnit\Framework\TestCase;


class ImageTest extends TestCase
{
    public function testGallery()
    {
        $gallery = Gallery::portoflioGallery(7);
        $this->assertInternalType('array', $gallery);
        $this->assertInstanceOf('Image', $gallery[0]);
    }


    public function testThumbnail()
    {
        $thumbnail = Gallery::portfolioThumbnail(7);
        $this->assertInstanceOf('Image', $thumbnail);
        $this->assertTrue($thumbnail->isThumbnail());
    }
}