<?php
  require_once 'phamlp/haml/HamlParser.php';
  $haml = new HamlParser(array('style' => 'nested', 'ugly' => false));

  $query = strrpos($_SERVER['REQUEST_URI'], '?');
  $path = $_SERVER['REQUEST_URI'];
  if ($query !== false) {
    $path = substr($_SERVER['REQUEST_URI'], 0, $query);
  }

  $hamlPath = substr($path, 1).'.haml';

  $slash = strrpos($path, '/');
  $hamlFallback = '';
  if ($slash !== false) {
    $hamlFallback = substr($path, 1, $slash - 1).'.haml';
  }

  if (file_exists($hamlPath)) {
    $_SERVER['SCRIPT_NAME'] = $path.'.php';
    $page = $haml->parse($hamlPath);
  } elseif (file_exists($hamlFallback)) {
    $_SERVER['SCRIPT_NAME'] = substr($path, 0, $slash - 1).'.php';
    $URI_KEY = substr($path, $slash + 1);
    $page = $haml->parse($hamlFallback);
  } elseif ($hamlPath == '.haml') {
    $page = $haml->parse('index.haml');
  } else {
    $page = $haml->parse('404.haml');
  }

  eval('?'.'>'.$page);
?>