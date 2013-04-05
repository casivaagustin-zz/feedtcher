<?php

class ParseBase {

  /**
   * Creates a new instance of a Parser
   * 
   * @param SimpleXmlElement $content 
   */
  public function __construct($content) {
    $this->content = $content;
  }

  public function parse() {
    throw new Exception('Not implemented');
  }
  
}