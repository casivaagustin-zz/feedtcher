<?php

namespace Feedtcher;

class ParserRss extends ParserBase {

  /**
   * Parse a RSS Feed
   * 
   * @return \Feedtcher\Feed
   */
  public function parse() {
    $channel = $this->feed->channel;  
    $entries = $this->feed->channel->item;

    $feed = new Feed($channel->title, $channel->description, 
        $channel->link, $channel->pubDate, $this->getRawData()
    );

    foreach ($entries as $entry) {
      $description = $entry->description;

      if (isset($entry->content)) {
        $description .= $entry->content;
      }

      $entry = new Entry(
        $entry->title,
        $description,
        $entry->author,
        $entry->pubDate,
        $entry->link
      );

      $feed[] = $entry;
    }

    return $feed;
  }
  
}