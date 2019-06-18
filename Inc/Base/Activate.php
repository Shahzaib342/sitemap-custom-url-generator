<?php
/**
 * @package SitemapCustomURLGenerator
 */

namespace Inc\Base;

use Inc\Base\SetDatabase;

/**
 * Class Activate
 * @package Inc\Base
 */
class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();
        SetDatabase::SetDatabase();
    }
}