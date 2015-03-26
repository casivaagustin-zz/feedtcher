<?php

namespace Feedtcher;

class ParserAtom extends ParserBase {

  /**
   * Parse a Atom Feed
   * @return \Feedtcher\Feed
   */
  public function parse() {
    $channel = $this->feed;  
    $entries = $this->feed->entry;

    $feed = new Feed($channel->title, $channel->subtitle, $channel->link,
      $channel->updated, $this->getRawData());

    foreach($entries as $entry) {
      $description = $entry->description;

      if (isset($entry->content)) {
        $description .= $entry->content;
      }

      $entry = new Entry(
        $entry->title,
        $description,
        $entry->author,
        $entry->updated,
        $entry->link
      );

      $feed[] = $entry;
    }

    return $feed;  
  }
}