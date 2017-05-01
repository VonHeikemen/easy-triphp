<?php

$router = Flight::router();

$router->get('/', 'App\Controllers\Home@index', ['name' => 'home.index']);