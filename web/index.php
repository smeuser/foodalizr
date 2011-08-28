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
$router->addRoute(new \Knid\Routing\Route('/api/create', array(
    'controller' => '\\Foodalizr\\Controller\\Api',
    'action' => 'create',
)));
$router->addRoute(new \Knid\Routing\Route('/api/edit', array(
    'controller' => '\\Foodalizr\\Controller\\Api',
    'action' => 'edit',
)));
$router->addRoute(new \Knid\Routing\Route('/api/delete', array(
    'controller' => '\\Foodalizr\\Controller\\Api',
    'action' => 'delete',
)));
$router->addRoute(new \Knid\Routing\Route('/api/view', array(
    'controller' => '\\Foodalizr\\Controller\\Api',
    'action' => 'view',
)));
$router->addRoute(new \Knid\Routing\Route('/api/list', array(
    'controller' => '\\Foodalizr\\Controller\\Api',
    'action' => 'list',
)));

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
