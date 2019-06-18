<?php
/**
 * @package SitemapCustomURLGenerator
 */

namespace Inc\Base;

/**
 * Class SetDatabase
 * @package Inc\Base
 */
class SetDatabase
{
    public static function SetDatabase()
    {
        global $wpdb;
        $db_table_name = $wpdb->prefix . 'sitemap_custom_url_generator';  // table name
        $charset_collate = $wpdb->get_charset_collate();
        if($wpdb->get_var( "show tables like '$db_table_name'" ) != $db_table_name ) {
            $sql = "CREATE TABLE $db_table_name (
                id int(11) NOT NULL auto_increment,
                url varchar(256) NOT NULL,
                date datetime default CURRENT_TIMESTAMP,
                UNIQUE KEY id (id)
        ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
            add_option('test_db_version');
        }

    }
}