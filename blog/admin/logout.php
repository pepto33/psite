<?php
require_once('../includes/config.php');
$user->logout();
header('Location: /');
//header('Location: ../index.php');
