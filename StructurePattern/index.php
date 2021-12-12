<?php

spl_autoload_register(function ($class) {
	include __DIR__ . '/' . str_replace("\\", "/",  $class) . '.php';
});


$advertisement = (new \Entity\Advertisement())
	->setBody("test")
	->setTitle("test")
	->setDuration(10);

$formatter = new \Service\Formatting\PlainTextFormatter($advertisement);
$formatter = (new \Decorator\BodyTextDecorator($formatter));
$formatter->setTitle("TitleText");
$formatter->setFooter("FooterText");
var_dump($formatter->format("text"));