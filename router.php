<?php
$url = explode("/", $_SERVER['REQUEST_URI']);

if ($url[1] == "contact") {
  $content = file_get_contents("pages/contact.html");
} else if ($url[1] == "coffee_mashine") {
  $content = file_get_contents("pages/coffee_mashine.html");
} else if ($url[1] == "xo") {
  $content = file_get_contents("pages/xo.html");
} else if ($url[1] == "calc") {
  $content = file_get_contents("pages/calc.html");
} else if ($url[1] == "clock") {
  $content = file_get_contents("pages/clock.html");
} else if ($url[1] == "blog") {
  require_once("blog/index.php");
} else if ($url[1] == "users") {
  require_once("pages/users/index.php");
} else {
  $content = file_get_contents("pages/index.php");
}

if (!empty($content))
  require_once("template.php");
