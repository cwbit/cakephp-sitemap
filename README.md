# cakephp-sitemap
Sitemap generator plugin for CakePHP 3x apps

## Installation

This package is available for easy installation through [Packagist](http://packagist.com)

```bash
composer require cwbit/cakephp-sitemap "~1.0"
```

Then make sure to load the plugin normally in your app. e.g.

```php
# somewhere in config/bootstrap.php

Plugin::load('Sitemap', [
    'routes' => true,
    ]);

```

Finally, set your configuration array (see below)

## Configuration

The plugin will look for an array of info using `Configure::read('Sitemap')` so just make sure such an array is loaded during bootstrapping. The easiest way to do this is to add it to your `config/app.php` file.

There are two sections the plugin looks for `static` pages and `dynamic` pages.

### Static Pages

Static pages are nested under `Sitemap.static` which expects an array of URLs. This can take any URL accepted by `Router::url()`.

```php
	'Sitemap' => 
		'static' => 
			['_name' => 'pages:about'],
			'http://example.com/search',
			['controller'=>'Pages', 'action'=>'display', 'terms-of-service'],
```

### Dynamic Pages

You can dynamically create links by nesting a group of config settings under `Sitemap.dynamic`

```php
	'Sitemap' => 
		'dynamic' => 
			'Items' =>  #the name of the model to get entities for
				'cachekey' => 'sitemap', 	# cachekey to use (e.g. from Configure::read('Cache.sitemap'))
				'finders' => [ .. ], 		# array of model-layer finders for getting entities
				'xmlTags' =>				# xml tags to output with each sitemap line
					'loc' => 'url'				# default 'url'; entity attribute name, or array, or string
					'priority' => 0.5			# default 0.5; 0 to 1 priority
					'lastmod' => 'updated'		# default 'updated'; entity attribute giving lastmod time
					'changefreq' => 'daily'		# default 'daily'; always, hourly, daily, weekly, yearly, never		
				

```

## Example Configuration

Here's a sample configuration straight from one of the projects using this plugin

```php
	# .. in config/app.php
	...,
    'Sitemap' => [
        'static' => [
            ['_name' => 'user-register'],
            ['_name' => 'user-resetpw'],
            ['_name' => 'user-login'],
            ['_name' => 'user-logout'],
            ['_name' => 'user-dashboard'],
            ['_name' => 'privacy'],
            ["_name" => "contact-us"],
            ["_name" => "rewards"],
            ["_name" => "terms-of-service"],
            ["_name" => "about-us"],            
            ["_name" => "search"],
        ],
        'dynamic' => [
            'Categories' => [
                'cacheKey' => 'sitemap',
                'finders' => [
                    'visible' => [],
                    ],
                'xmlTags'=> [
                    'loc' => 'url',
                    'priority' => '0.9',
                    'changefreq' => 'always',
                ],
            ],
            'Items' => [
                'cacheKey' => 'sitemap',
                'finders' => [
                    'visible' => [],
                    ],
                'xmlTags'=> [
                    'loc' => 'permalink',
                    'priority' => '0.9',
                    'changefreq' => 'always',
                ],
            ],
        ],
    ],
```

which produces the following

```xml
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>http://example.com/</loc>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>http://example.com/register</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/reset-password</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/login</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/logout</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/my-account</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/privacy</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/contact-us</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/rewards</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/terms-of-service</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/about-us</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/search/</loc>
        <priority>0.5</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>http://example.com/product/spice-widgets</loc>
        <priority>0.9</priority>
        <changefreq>always</changefreq>
    </url>
    <url>
        <loc>http://example.com/product/posh-widgets</loc>
        <priority>0.9</priority>
        <changefreq>always</changefreq>
    </url>
    <url>
        <loc>http://example.com/product/spice-widgets/cayenne</loc>
        <priority>0.9</priority>
        <changefreq>always</changefreq>
    </url>
    <url>
        <loc>http://example.com/product/posh-widgets/foobar</loc>
        <priority>0.9</priority>
        <changefreq>always</changefreq>
    </url>
</urlset>
```