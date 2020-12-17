<?php

namespace Tests\Unit;

use App\Models\UrlShort;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    /**
     * url model test.
     *
     * @return void
     */
    public function testUrlModel()
    {
        $url = new UrlShort();

        $url->setShort('short');
        $url->setLink('long link to be shortened');

        $this->assertEquals($url->getShort(), 'short');
        $this->assertEquals($url->getLink(), 'long link to be shortened');
    }

}
