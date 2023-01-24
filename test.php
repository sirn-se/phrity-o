<?php

require_once 'vendor/autoload.php';

$factory = new Phrity\O\Factory();

$e = new Phrity\O\Obj((object)['a' => (object)['b' => 2]]);
$f = new Phrity\O\Obj($e);

$res = $factory->convert(new Phrity\O\Arr([]), true);

//echo get_class($res)."\n";
var_dump($res);