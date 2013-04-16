<?php

/**
 * Boostrap to make Tests
 */
function psr0_autoload($className)
{
  $className = ltrim($className, '\\');
  $fileName  = '';
  $namespace = '';
  if ($lastNsPos = strripos($className, '\\')) {
    $namespace = substr($className, 0, $lastNsPos);
    $className = substr($className, $lastNsPos + 1);
    $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
  }
  $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
 
  if (file_exists('./../src/' . $fileName)) {
    require './../src/' . $fileName;
  } elseif (file_exists('./../../phrequests/src/' . $fileName)) { 
    require './../../phrequests/src/' . $fileName;
  }
}

spl_autoload_register('psr0_autoload');