<?php

$app->register('router', 'Maer\Router\Router');

$app->register('view', 'eftec\bladeone\BladeOne', [
  $config->get('app.path.templates.views'),
  $config->get('app.path.templates.compiled'),
]);

require_once 'extend.php';
