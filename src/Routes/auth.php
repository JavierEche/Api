<?php

use App\Config\ResponseHttp;
use App\Controllers\UserController;

$method  = strtolower($_SERVER['REQUEST_METHOD']);
$route   = $_GET['route'];
$params  = explode('/' , $route);
$data    = (empty($_POST)) ? json_decode(file_get_contents("php://input"),true) : $_POST;
$headers = getallheaders();

/*************Instancia del controlador de usuario**************/
$app = new UserController($method,$route,$params,$data,$headers);

/***********************Rutas*********************/
$app->getLogin("auth/{$params[1]}/{$params[2]}/");

/****************Error 404*****************/
echo json_encode(ResponseHttp::status404());