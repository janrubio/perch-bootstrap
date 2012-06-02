<?php
  require_once 'phamlp/haml/HamlParser.php';
  $haml = new HamlParser(array('style' => 'nested', 'ugly' => false));

  $hamlPath = substr($_SERVER['REQUEST_URI'], 1).'.haml';

  if (file_exists($hamlPath)) {
    $page = $haml->parse($hamlPath);
  } else {
    $page = '404';
  }

  eval('?'.'>'.$page);
?>