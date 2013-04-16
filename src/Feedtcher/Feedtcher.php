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
    $parser = new Parser($content);
    $feed = $parser->parse();
    return $feed;
  }
 
  /**
   * Wrapper to feetch feeds
   * 
   * @param String $url
   * 
   * @return \Feedtcher\Feedtcher\Feed
   */
  public static function fectch($url) {
    $feedtech = new Feedtcher($url);
    return $feedtech->doFetch();
  }
}