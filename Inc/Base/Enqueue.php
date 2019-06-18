<?php
/**
 * @package SitemapCustomURLGenerator
 */

namespace Inc\Base;
use Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
       add_action('admin_enqueue_scripts',array($this,'enqueue'));
//        add_action('wp_enqueue_scripts',array($this,'enqueue'));
    }

    function enqueue()
    {
        wp_enqueue_style('mypluginstyle',$this->plugin_url .('assets/style.css'));
        wp_enqueue_script( 'jQuery', $this->plugin_url .('assets/jQuery.min.js'), array( 'jquery' ));
        wp_enqueue_script('mypluginscript',$this->plugin_url.('assets/plugin.js'));
        wp_localize_script( 'mypluginscript', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
    }
}