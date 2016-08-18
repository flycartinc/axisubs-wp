<?php namespace Axisubs;

/** @var \Herbert\Framework\Router $router */

$router->get([
    'as' => 'postSingle',
    'uri' => 'post/{id}',
    'uses' => __NAMESPACE__ . '\Controllers\PostController@showPost'
]);

$router->get([
    'as' => 'subscribe',
    'uri' => '/subscribe/{plan_slug}',
    'uses' => __NAMESPACE__ . '\Controllers\PlanController@showSelectedPlan'
]);

$router->post([
    'as' => "axisubsAjax",
    'uri' => 'axisubs-admin-ajax',
    'uses' => __NAMESPACE__ . '\Controllers\AdminController@ajaxCall'
]);