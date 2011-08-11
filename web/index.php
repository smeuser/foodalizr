<?php

$config = include '../src/config.php';

require_once implode(DIRECTORY_SEPARATOR, array(
    dirname(__FILE__), '..', 'src', 'autoload.php'
));

$db = new \mysqli($config['db']['host'], $config['db']['user'],
    $config['db']['password'], $config['db']['name']);
$db->query('SET NAMES utf8;');
$mapperFactory = new \Foodalizr\Model\MapperFactory($db);

$router = new \Knid\Routing\Router();
$router->addRoute(new \Knid\Routing\Route('/person/post', array(
    'controller' => '\\Foodalizr\\Controller\\Person',
)));

$request = new \Knid\Http\Request(array(
    'cookie' => $_COOKIE,
    'env' => $_ENV,
    'files' => $_FILES,
    'get' => $_GET,
    'post' => $_POST,
    'server' => $_SERVER,
));
$response = new \Knid\Http\Response();

$routeParams = $router->route($request);

$response->addHeader(new \Knid\Http\Header('Content-Type', 'text/html; charset=utf-8'));
$response->setContent('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Foodalizr</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="css/screen.css" />
</head>
<body>

<ul class="nav">
    <li><a href="#" class="add meal-add">Essen</a></li>
    <li><a href="#" class="add person-add">Person</a></li>
</ul>

</body>
</html>');
$response->send();
