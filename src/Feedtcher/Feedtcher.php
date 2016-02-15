<?php
/**
 * Simple librarary to fetch Feeds ATOM or RSS.
 * 
 * @author Casiva Agustin <casivagustin@gmail.com> 
 * 
 */
namespace Feedtcher;

use PHRequests\PHRequests;

class Feedtcher {

  /*
   * Creates a new instance of Feedtecher
   */
  public function __construct($url) {
    $this->url = $url; 
  }

  /**
   * Gets and Parse a feed
   * 
   * @return Feed : A Feed object with a collection of entries.
   */
  public function doFetch() {
    $content = PHRequests::get($this->url);
    return $this->load($content->content);
  }
 
  /**
   * Wrapper to fetch feeds
   * 
   * @param String $url
   * 
   * @return \Feedtcher\Feed
   */
  public static function fetch($url) {
    $feedtech = new Feedtcher($url);
    return $feedtech->doFetch();
  }

  public function load($content) {
    $parser = new Parser($content);
    $feed = $parser->parse();
    return $feed;
  }
}
