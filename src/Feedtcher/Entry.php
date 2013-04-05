<?php

namespace Feedtcher;

class Entry {
  
  /**
   * Creates an Entry Object
   * 
   * @param type $title
   * @param type $description
   * @param type $author
   * @param type $date
   * @param type $link
   */
  public function __construct($title, $description, $author, $date, $link) {
    $date = strtotime($date); 
    $this->title = $title;
    $this->description = $description;
    $this->author = $author?$author:'';
    $this->date = $date?$date:time();
    $this->link = $link;
  }

  public function __get($name) {
    return $this->$name;
  }

  public function __set($name, $value) {
    return $this->$name = $value;
  }
  
}