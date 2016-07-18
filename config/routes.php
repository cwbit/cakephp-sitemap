<?php
  use Cake\Routing\Router;

  # enable /sitemap and /sitemap.xml
  Router::scope('/', function($routes){
    $routes->extensions(['xml']);
    $routes->connect('/sitemap', [
      'plugin' => 'Sitemap',
      'controller' => 'Sitemaps',
      'action' => 'display'
    ]);
  });
