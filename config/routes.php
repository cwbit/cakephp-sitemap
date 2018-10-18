<?php
  use Cake\Routing\Router;

  # enable /sitemap and /sitemap.xml
  Router::scope('/', function($routes){
    $routes->setExtensions(['xml']);
    $routes->connect('/sitemap', [
      'plugin' => 'Sitemap',
      'controller' => 'Sitemaps',
      'action' => 'display'
    ]);
  });
