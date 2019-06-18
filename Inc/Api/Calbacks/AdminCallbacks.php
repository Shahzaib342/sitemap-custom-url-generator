<?php

/**
 * @package SitemapCustomURLGenerator
 */

namespace Inc\Api\Calbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function adminDashboard()
    {
        return require_once ("$this->plugin_path/templates/admin.php");
    }
    public function shahzaibOptionsGroup($input)
    {
        return $input;
    }
    public function shahzaibAdminsection($input)
    {
        return 'set set';
    }
    public function customURL($input)
    {
//        $value = esc_attr__(get_option('url'));
        echo '<input type="text" class="regular-text" name="url"  placeholder="Enter Url">';
    }
}