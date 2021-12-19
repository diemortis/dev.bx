<?php

use Entity\Service;
use Entity\Status;
use Entity\User;

spl_autoload_register(function ($class) {
	include __DIR__ . '/' . str_replace("\\", "/",  $class) . '.php';
});

\Event\EventBus::getInstance()->subscribe("statusActiveDate", "\\Helper\\Subscriber::statusActiveDate");
$status = new Status();
$date = date(DATE_RFC822);
$status->setActiveDate($date);

//
// $service = new Status();
// $context = new \StateStatus\StatusStateContext(new \StateStatus\ActiveState($service));
//
// var_dump($context);
// var_dump($context->changeState());
// var_dump($context->changeState());
