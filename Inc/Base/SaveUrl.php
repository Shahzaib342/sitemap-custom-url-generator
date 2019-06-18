<?php
/**
 * @package SitemapCustomURLGenerator
 */

namespace Inc\Base;

/**
 * Class SaveUrl
 * @package Inc\Base
 */
class SaveUrl
{
    public static function SaveUrl()
    {
        global $wpdb;
        $tablename = $wpdb->prefix.'sitemap_custom_url_generator';

        $clean_url = str_replace("&","&amp;",$_POST['url']);

        $isUrlExist = $wpdb->get_results( "SELECT * FROM $tablename where url = '$clean_url'");

        if(count($isUrlExist) >=1 ) {
            echo 'already exist';
            wp_die();
        }

        $wpdb->insert( $tablename, array(
            'url' => $clean_url
        ));
        echo 'New Url added';
        wp_die();
    }

}