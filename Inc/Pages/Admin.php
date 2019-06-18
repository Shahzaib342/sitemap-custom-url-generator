<?php
/**
 * @package SitemapCustomURLGenerator
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Calbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $pages;
    public $callbacks;

    public function register()
    {

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addpages($this->pages)->withSubPage('Dashboard')->register();
    }

    public  function setPages()
    {
        $this->pages = array(
            array(
                'page_title'=>'Add your custom URl to the SEO sitemap',
                'menu_title'=>'Sitemap Custom URL generator',
                'capability'=>'manage_options',
                'menu_slug'=>'sitemap_custom_url_generator',
                'callback'=>array($this->callbacks,'adminDashboard'),
                'icon_url' =>'dashicons-store',
                'position'=>110
            )
        );
    }


    public function setSettings()
    {
        $args = array(
          array(
              'option_group'=>'shahzaib_options_group',
              'option_name'=>'text_example',
              'callback'=>array($this->callbacks,'shahzaibOptionsGroup')
          ),
            array(
                'option_group'=>'shahzaib_options_group',
                'option_name'=>'url'
            )
        );
        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id'=>'shahzaib_admin_index',
                'title'=>'Settings',
                'callback'=>array($this->callbacks,'shahzaibAdminsection'),
                'page'=>'sitemap_custom_url_generator'
            )
        );
        $this->settings->setSections($args);
    }
    public function setFields()
    {
        $args = array(
                array(
                    'id'=>'url',
                    'title'=>'URL',
                    'callback'=>array($this->callbacks,'customURL'),
                    'page'=>'sitemap_custom_url_generator',
                    'section'=>'shahzaib_admin_index',
                    'args'=>array(
                        'label_for'=>'url',
                        'class'=>'url'
            )
                )
        );
        $this->settings->setFields($args);
    }
}