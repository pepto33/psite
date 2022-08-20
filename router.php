<?php
$url = explode("/", $_SERVER['REQUEST_URI']);

if ($url[1] == "contact") {
  $content = file_get_contents("pages/contact.html");
} else if ($url[1] == "nochnorozhdennye") {
  $content = file_get_contents("pages/nochnorozhdennye.html");
} else if ($url[1] == "orki-magxary") {
  $content = file_get_contents("pages/orki-magxary.html");
} else if ($url[1] == "zandalarskie-trolli") {
  $content = file_get_contents("pages/zandalarskie-trolli.html");
} else if ($url[1] == "abc") {
  $content = file_get_contents("pages/abc.html");
} else if ($url[1] == "coffee_mashine") {
  $content = file_get_contents("pages/coffee_mashine.html");
} else if ($url[1] == "xo") {
  $content = file_get_contents("pages/xo.html");
} else if ($url[1] == "calc") {
  $content = file_get_contents("pages/calc.html");
} else if ($url[1] == "clock") {
  $content = file_get_contents("pages/clock.html");
} else if ($url[1] == "tetris") {
  $content = file_get_contents("pages/tetris.html");
} else if ($url[1] == "27isfunc") {
  $content = file_get_contents("pages/27isfunc.html");
} else if ($url[1] == "chess") {
  $content = file_get_contents("pages/chess/chess.html");
} else {
  $content = file_get_contents("pages/index.php");
}

if (!empty($content))
  require_once("template.php");
