<?php

namespace Feedtcher;

class Parser {

  /**
   * Creates a new instance of Parser
   * 
   * @param String $feedData : Feed Content
   */
  public function __construct($feedData) {
    libxml_use_internal_errors(true);
    $this->rawData = $feedData;
    $this->feed = new \SimpleXMLElement($feedData);
    $this->setParser($this->feed->getName());
    libxml_use_internal_errors(false);
  }

  /**
   * Parse the Content and return a Feed with all entries
   * 
   * @return Feed
   */
  public function parse() {
   return $this->parser->parse(); 
  }

  /**
   * Sets the concrete parser to use depending on the root element
   * of the feed.
   * 
   * @param String $feedRoot
   * 
   * @throws Exception : In case of a not valid name
   */
  protected function setParser($feedRoot) {
    switch (strtolower($feedRoot)) {
      case 'rss':
        $this->parser = new ParserRss($this->feed, $this->rawData);
        break;
      case 'feed':
        $this->parser = new ParserAtom($this->feed, $this->rawData);
        break;
      default:
        throw new \Exception('Not a valid Feed');
    }
  }

}