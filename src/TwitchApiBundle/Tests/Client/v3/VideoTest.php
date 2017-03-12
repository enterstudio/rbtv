<?php

namespace TwitchApiBundle\Tests\Client\v3;

use TwitchApiBundle\Client\ClientV3;

class VideoTest extends PHPUnit_Framework_TestCase
{
    /**
   * @var ClientV3
   */
  private $client;

    protected function setUp()
    {
        $this->client = new ClientV3();
    }

    public function testVideo()
    {
        $video = $this->client->getVideo('c6055863');

        $this->assertEquals('Twitch Weekly - February 6, 2015', $video->title);
    }
}
