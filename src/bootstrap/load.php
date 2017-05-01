<?php

define('BASEPATH', __DIR__.'/../..');

require BASEPATH.'/vendor/autoload.php';

(new Dotenv\Dotenv( BASEPATH ))->load();
$config = new Solution10\Config\FilesystemConfig([ BASEPATH.'/src/config' ]);

Flight::set('config', $config);
$app = Flight::app();

$app->path( $config->get('app.path.root') );
$app->path( $config->get('app.path.vendor') );

require_once 'register.php';
