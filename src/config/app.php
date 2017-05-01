<?php

return [
  'env' => getenv('APP_ENV'),

  'path' => [
    'root' => BASEPATH.'/src',
    'vendor' => BASEPATH.'/vendor',
    'routes' => BASEPATH.'/src/app/routes.php',
    'templates' => [
      'views' => BASEPATH.'/src/app/templates/views',
      'compiled' => BASEPATH.'/src/app/templates/compiled'
    ] 
  ],

  'helpers' => [
    'support' => BASEPATH.'/src/app/helpers/support.php'
  ]
];