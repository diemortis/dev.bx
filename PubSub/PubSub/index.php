<?php

use Entity\Service;
use Entity\Status;
use Entity\User;

spl_autoload_register(function ($class) {
	include __DIR__ . '/' . str_replace("\\", "/",  $class) . '.php';
});


$service = new Status();
$context = new \StateUserStatus\StatusStateContext(new \StateUserStatus\ActiveState($service));

var_dump($context);
var_dump($context->changeState());
var_dump($context->changeState());
