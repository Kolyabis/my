<?php
include('init.php');
$front = FrontController::getInstance();
$front->route();
echo $front->getBody();