<?php

/** @var  \Herbert\Framework\Application $container */
/** @var  \Herbert\Framework\Http $http */
/** @var  \Herbert\Framework\Router $router */
/** @var  \Herbert\Framework\Enqueue $enqueue */
/** @var  \Herbert\Framework\Panel $panel */
/** @var  \Herbert\Framework\Shortcode $shortcode */
/** @var  \Herbert\Framework\Widget $widget */

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('axisubs_zones', function($table)
{
    $table->increments('axisubs_zone_id');
    $table->string('country_code');
    $table->string('zone_code');
    $table->string('zone_name');
    $table->integer('enabled');
    $table->integer('ordering');
});

//For adding zone data
axisubs_installd();

function axisubs_installd(){
    global $wpdb;
    $file = WP_PLUGIN_URL."/axisubs/sql/zones.sql";
    $f = file_get_contents($file);
    $sql = str_replace("#__", $wpdb->prefix, $f);
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}