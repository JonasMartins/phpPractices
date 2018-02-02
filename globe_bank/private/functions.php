<?php

function url_for($script_path) 
{
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($url="")
{
	return urlencode($url);
}

function raw_u($url="")
{
	return rawurlencode($url);
}

function h($string="") 
{
  return htmlspecialchars($string);
}

function error_404() 
{
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500() 
{
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

?>
