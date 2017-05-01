<?php

$app->map('start', function(){
  Flight::router()->dispatch();
});

$app->map('render', function($template, $data=[]){
  $body = Flight::view()->run($template, $data);
  
  Flight::response()
    ->header('content-type', 'text/html')
    ->status(200)
    ->write($body)
    ->send();
});

$app->map('get_config', function($param, $default=NULL){
  return Flight::get('config')->get($param, $default);
});

$app->map('setupDB', function(){
  $config = Flight::get('config');

  switch ($config->get('database.use')) {
    case 'path':
      R::setup($config->get('database.path'));
      break;
    
    case 'connection':
      R::setup(
        $config->get('database.conn'),
        $config->get('database.username'),
        $config->get('database.password')
      );
      break;
  }

  R::freeze($config->get('database.freeze'));
});

require_once $config->get('app.helpers.support');
require_once 'start.php';
