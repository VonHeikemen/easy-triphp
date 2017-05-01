<?php 

if (!function_exists('app')) { 

  function app(){
    return Flight::app();
  }

}

if (!function_exists('render')) { 

  function render($template, $data=[]){
    return Flight::render($template, $data);
  }

}

if (!function_exists('config')) { 

  function config($var, $default=NULL) {
    return Flight::get_config($var, $default);
  }

}

if (!function_exists('route')) { 

  function route($route_name, $params=[]) {
    return Flight::router()->getRoute($route_name, $params);
  }
  
}

if (!function_exists('redirect')) { 

  /*
  * Redirect to named routes
  */

  function redirect($route_name, $params=[], $code_status=NULL) {
    $route = Flight::router()->getRoute($route_name, $params);

    Flight::redirect($route, $code_status);
  }
  
}
