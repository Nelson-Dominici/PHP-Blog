<?php

require_once("bootstrap.php");

$app->add($body);

$routes = require_once("app/routes.php");
$routes($app);

$app->run();