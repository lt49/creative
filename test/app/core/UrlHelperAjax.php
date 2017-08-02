<?php

require_once "app/core/controllers.php";
$token = isset($_REQUEST["token"])?$_REQUEST["token"]:"";
$url = "dashboard";
redirectController($url, $token);
