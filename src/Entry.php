<?php

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
    $this->title = $title;
    $this->description = $description;
    $this->author = $author;
    $this->date = $date;
    $this->link = $link;
  }

  public function __get($name) {
    return $this->$name;
  }

  public function __set($name, $value) {
    return $this->$name = $value;
  }
  
}