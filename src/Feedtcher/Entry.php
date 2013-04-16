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

   /** $description = preg_replace('/(<[^>]+) style=".*?"/i', '', $description);
    $description = preg_replace('/(<[^>]+) class=".*?"/i', '', $description);
    $description = preg_replace('/(<[^>]+) height=".*?"/i', '', $description);
    $description = preg_replace('/(<[^>]+) width=".*?"/i', '', $description);
    $description = preg_replace('/(<[^>]+) border=".*?"/i', '', $description);**/
    
   /** $description = str_replace('&gt', '>', $description); 
    $description = str_replace('&lt', '<', $description);
    * 
    */

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