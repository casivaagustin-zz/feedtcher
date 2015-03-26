<?php

class FeedtcherTest extends PHPUnit_Framework_TestCase {

  public function testRss() {
    $url = 'http://casivaagustin.com.ar/?feed=rss2'; 
    $feed = \Feedtcher\Feedtcher::fetch($url);
    $this->assertEquals('Feedtcher\Feed', get_class($feed));
    $this->assertTrue(!empty($feed[0]));
  }

  public function testAtom() {
    $url = 'http://ozkatz.github.com/feeds/all.atom.xml';
    $feed = \Feedtcher\Feedtcher::fetch($url);
    $this->assertEquals('Feedtcher\Feed', get_class($feed));
    $this->assertTrue(!empty($feed[0]));
  }

  /**
   * @expectedException Exception
   */
  public function testNotValidFeed() {
    $url = 'http://www.google.com';
    $feed = \Feedtcher\Feedtcher::fetch($url);
  }

  /**
   * @expectedException Exception
   */
  public function testNotValidUrl() {
    $url = 'http://zaranga.lol.fail';
    $feed = \Feedtcher\Feedtcher::fetch($url);
  }

  public function testLeftJoin() {

    $nf = file_get_contents(dirname(__FILE__) . '/newFeed.rss');
    $of = file_get_contents(dirname(__FILE__) . '/oldFeed.rss');

    $feetcher = new \Feedtcher\Feedtcher('');

    $newFeed = $feetcher->load($nf);
    $oldFeed = $feetcher->load($of);

    $join = new \Feedtcher\Joins($newFeed, $oldFeed);
    $diffFile = $join->leftOuter();

    $this->assertEquals(count($newFeed->collection), 10);
    $this->assertEquals(count($oldFeed->collection), 7);
    $this->assertEquals(count($diffFile->collection), 3);

  }
  
}
