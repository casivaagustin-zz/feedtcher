<?php

namespace Feedtcher;

class ParserBase {

  /**
   * Creates a new instance of a Parser
   * 
   * @param SimpleXmlElement $content 
   */
  public function __construct($feedContent) {
    $this->feed = $feedContent;
  }

  public function parse() {
    throw new Exception('Not implemented');
  }
  
}