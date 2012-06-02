<?php
  header("Content-Type: text/css");
  require_once('../phamlp/sass/SassParser.php');

  $sass = new SassParser(array('style'=>'nested'));
  $css = $sass->toCss('screen.scss');
  echo $css;
?>