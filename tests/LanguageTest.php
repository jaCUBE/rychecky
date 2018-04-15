<?php


use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    public function testLocale()
    {
        $this->assertEquals(strlen(Language::getLocale()), 2);
    }

}