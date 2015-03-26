<?php

namespace Feedtcher;

class ParserBase {

  /**
   * Creates a new instance of a Parser
   *
   * @param $feedContent
   * @param $rawData
   *
   * @internal param \Feedtcher\SimpleXmlElement $content
   */
  public function __construct($feedContent, $rawData) {
    $this->feed = $feedContent;
    $this->rawData = $rawData;
  }

  public function parse() {
    throw new Exception('Not implemented');
  }

  public function getRawData() {
    return $this->rawData;
  }
  
}