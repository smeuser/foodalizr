<?php

$config = include '../src/config.php';

require_once implode(DIRECTORY_SEPARATOR, array(
    dirname(__FILE__), '..', 'src', 'autoload.php'
));

$router = new \Knid\Routing\Router();
$router->addRoute(new \Knid\Routing\Route('/', array(
    'controller' => '\\Foodalizr\\Controller\\Index',
    'action' => 'index',
)));
$router->addRoute(new \Knid\Routing\Route('/person/post', array(
    'controller' => '\\Foodalizr\\Controller\\Person',
    'action' => 'post',
)));

$db = new \mysqli($config['db']['host'], $config['db']['user'],
    $config['db']['password'], $config['db']['name']);
$db->query('SET NAMES utf8;');
$mapperFactory = new \Knid\Mapper\Factory($db);

$controllerFactory = new \Knid\Controller\Factory($mapperFactory);

$fontController = new \Knid\Controller\Front($router, $controllerFactory);

$request = new \Knid\Http\Request(array(
    'cookie' => $_COOKIE,
    'env' => $_ENV,
    'files' => $_FILES,
    'get' => $_GET,
    'post' => $_POST,
    'server' => $_SERVER,
));
$response = new \Knid\Http\Response();

$fontController->dispatch($request, $response);
