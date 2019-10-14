<?php



use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;

$run     = new Run;
$handler = new PrettyPageHandler;
$JsonHandler = new JsonResponseHandler;

$run->pushHandler($JsonHandler);
$run->pushHandler($handler);
$run->register();