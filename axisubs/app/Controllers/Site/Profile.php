<?php
/**
 * Created by PhpStorm.
 * User: aron-destiny
 * Date: 12/7/16
 * Time: 12:52 PM
 */
namespace Axisubs\Controllers\Site;

use Axisubs\Models\Site\Plans;
use Axisubs\Helper\Currency;
use Herbert\Framework\Http;
use Herbert\Framework\Notifier;
use Axisubs\Helper;

class Profile{
    //Show My profile
    public function showMyProfile(Http $http){
        $site_url = get_site_url();
        $pagetitle = "Subscriptions";
        $subscribtions_url = get_site_url().'/index.php?axisubs_subscribes=subscribe';
        $user = Plans::getUserDetails();
        $wp_user = Helper::getUserDetails();
        $wp_userD = array();
//        echo "<pre>";print_r($wp_user);exit;
        $wp_userD['ID'] = $wp_user->ID;
        $wp_userD['user_name'] = $wp_user->user_login;
        $wp_userD['first_name'] = $wp_user->first_name;
        $wp_userD['last_name'] = $wp_user->last_name;
        if(isset($wp_user->data->user_email)) {
            $wp_userD['email'] = $wp_user->data->user_email;
        }
        return view('@Axisubs/Site/myprofile/myprofile.twig', compact('pagetitle', 'subscribtions_url', 'site_url', 'user', 'wp_userD'));
    }

    public function showSelectedPlan(){
        return view('@Axisubs/Site/subscribe/details.twig');
    }
}