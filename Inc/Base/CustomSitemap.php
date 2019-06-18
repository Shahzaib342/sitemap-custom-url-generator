<?php
/**
 * @package SitemapCustomURLGenerator
 */

namespace Inc\Base;

/**
 * Class CustomSitemap
 * @package Inc\Base
 */
class CustomSitemap
{
    public static function CustomSitemap()
    {
        global $wpdb;
        $table_name = 'wp_sitemap_custom_url_generator';
        $results = $wpdb->get_results( "SELECT * FROM $table_name");

        global $wpseo_sitemaps;
        $date = $wpseo_sitemaps->get_last_modified('CUSTOM_POST_TYPE');
        $smp = '';
        foreach($results as $row) {

            $smp .= '<sitemap>' . "\n";
            $smp .= '<loc>'.$row->url.'</loc>' . "\n";
            $smp .= '<lastmod>' . $row->date . '</lastmod>' . "\n";
            $smp .= '</sitemap>' . "\n";
        }
        return $smp;
    }

}