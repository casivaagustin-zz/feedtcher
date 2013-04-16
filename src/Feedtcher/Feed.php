<?php

namespace Feedtcher;

class Feed implements \ArrayAccess, \Iterator {

  private $position = 0;
  private $collection = array();

  public function __construct($title, $description, $link, $update, $rawData){
    $this->position = 0;
    $this->collection = array();
    $this->title = $title;
    $this->description = $description;
    $this->link = $link;
    $this->update = $update;
    $this->rawData = $rawData;
  }
  
  public function getHash(){
    return md5($this->rawData);
  }

  public function __get($name) {
    return $this->$name;
  }

  public function __set($name, $value) {
    return $this->$name = $value;
  }

  public function offsetSet($offset, $value) {
    if (is_null($offset)) {
      $this->collection[] = $value;
    }
    else {
      $this->collection[$offset] = $value;
    }
  }

  public function offsetExists($offset) {
    return isset($this->collection[$offset]);
  }

  public function offsetUnset($offset) {
    unset($this->collection[$offset]);
  }

  public function offsetGet($offset) {
    return isset($this->collection[$offset]) ? $this->collection[$offset] : null;
  }

  function rewind() {
    $this->position = 0;
  }

  function current() {
    return $this->collection[$this->position];
  }

  function key() {
    return $this->position;
  }

  function next() {
    ++$this->position;
  }

  function valid() {
    return isset($this->collection[$this->position]);
  }

}