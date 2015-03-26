<?php

namespace Feedtcher;



class Entry {
  
  /**
   * Creates an Entry Object
   * 
   * @param string $title
   * @param string $description
   * @param string $author
   * @param string $date
   * @param string $link
   */
  public function __construct($title, $description, $author, $date, $link) {

    $htmlPurifierConfig = \HTMLPurifier_Config::createDefault();
    $purifier = new \HTMLPurifier($htmlPurifierConfig);
    $clean = $purifier->purify($description);
    
    $date = strtotime($date); 
    $this->title = $title;
    $this->description = $clean;
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