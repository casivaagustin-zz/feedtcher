<?php

/**
 * @file
 * This class compares two feeds objects and does calculations over them
 */
namespace Feedtcher;

class Joins {

  public function __construct(Feed $newFeed, Feed $previousFeed) {
    $this->newFeed = $newFeed;
    $this->previousFeed = $previousFeed;
  }

  /**
   * Gets all links in the new feed that are not present in the old feed.
   */
  public function leftOuter() {
    $outFeed = new Feed($this->newFeed->title, $this->newFeed->description,
        $this->newFeed->link, $this->newFeed->update,
        $this->newFeed->rawData
    );


    foreach ($this->newFeed as $nEntry) {
      $present = false;

      foreach ($this->previousFeed as $oEntry) {
        if ($oEntry->link->__toString() == $nEntry->link->__toString()) {
          $present = true;
          break;
        }
      }

      if (!$present) {
        $outFeed[] = $nEntry;
      }
    }

    return $outFeed;
  }

  /**
   * Gets all links that are present in both diffs
   */
  public function inner() {
    throw new \Exception('Not implemented');
  }

  /**
   * Gets all links in the old feed that are not in the new feed.
   */
  public function rightOuter() {
    throw new \Exception('Not implemented');
  }

  /**
   * Gets a new feed with all links in both feeds, no repetitions.
   */
  public function merge() {
    throw new \Exception('Not implemented');
  }

  /**
   * Gets a feed with the links in new and old but the links are not in both.
   */
  public function fullOuter() {
    throw new \Exception('Not implemented');
  }

}