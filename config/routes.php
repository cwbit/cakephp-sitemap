<?php
    use Cake\Routing\Router;

    # allow the plugin to parse xml
    Router::extensions('xml');

    # connect /sitemap
    Router::connect('/sitemap', [
        'plugin' => 'Sitemap',
        'controller' => 'Sitemaps',
        'action' => 'display'
        ]);
