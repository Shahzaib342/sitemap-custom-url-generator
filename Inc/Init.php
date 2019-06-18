<?php

/**
 * @package SitemapCustomURLGenerator
 */

namespace Inc;

final class Init
{
    /**
     * Stores all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return array(
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        );
    }

    /**
     *Loop through the classes, initialize them,and call the register method if exists
     */

    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }

    }


    /**
     * initialize the class
     * @param $class class from the services array
     * @return mixed new    class instance
     */

    private static function instantiate($class){
        $service = new $class();
        return $service;
    }
}

