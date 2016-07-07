<?php
    use Cake\Routing\Router;
?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach($pages as $page): ?>
        <?php if ($page['loc']): ?>
            <url>
                <loc><?= h($page['loc']) ?></loc>
                <?php if(!empty($page['lastmod'])): ?>
                    <lastmod><?= $page['lastmod'] ?></lastmod>
                <?php endif; ?>
                <?php if(!empty($page['priority'])): ?>
                    <priority><?= $page['priority']; ?></priority>
                <?php endif; ?>
                <?php if(!empty($page['changefreq'])): ?>
                    <changefreq><?= $page['changefreq']; ?></changefreq>
                <?php endif; ?>
            </url>
        <?php endif; ?>
    <?php endforeach; ?>
</urlset>
