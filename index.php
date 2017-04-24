<?php 

require 'vendor/autoload.php';

function resolve($value){
  $path = [__DIR__];

  if(is_array($value))
    $path = array_merge($path, $value);
  elseif(is_string($value))
    array_push($path, $value); 

  return join(DIRECTORY_SEPARATOR, $path);
}

define('ENV', 'development');

define( 'VIEWS', resolve(['src', 'templates', 'views']) );
define( 'COMPILED', resolve(['src', 'templates', 'compiled']) );
define( 'DS', DIRECTORY_SEPARATOR );

Flight::path( resolve('src') );
Flight::path( resolve('vendor') );

Flight::register('view', 'eftec\bladeone\BladeOne', [VIEWS, COMPILED]);

Flight::map('render', function($template, $data=[]){
    $body = Flight::view()->run($template, $data);
    
    Flight::response()
      ->header('content-type', 'text/html')
      ->status(200)
      ->write($body)
      ->send();
});

Flight::map('dd', function(){
  array_map(function ($x) {
    (new Dumper)->dump($x);
  }, func_get_args());

  die(1);
});

Flight::map('connectDB', function($connection='', $auth=[]){
  
  //Connection refer to: http://www.redbeanphp.com/index.php?p=/connection

  switch (ENV) {
    case 'development':
      R::setup('sqlite:/tmp/dbfile.db');
      break;

    case 'production':
      R::setup($auth['conn'], $auth['user'], $auth['pass']);
      R::freeze( TRUE );
      break;
  }
});

require 'src/routes.php';

Flight::start();

?>