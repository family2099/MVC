<?php

header("content-type: text/html; charset=utf-8");
session_start();
//以外面的index為主
require_once 'core/App.php';
require_once 'core/Controller.php';

$app = new App();

?>