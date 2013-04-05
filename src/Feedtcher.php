<?php

namespace Feedtcher;

use PHRequests;

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
  public function fetch() {
    $content = PHRequests::get($this->url);
    $parser = new Parser($content);
    $feed = $parser->parse();
    return $feed;
  }
  
}