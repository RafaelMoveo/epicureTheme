<?php

namespace App\Controllers;

use DateTime;
use DateTimeZone;
use Sober\Controller\Controller;

class PageRestaurants extends Controller
{
    protected $acf = ['restaurant_chef'];

    public static function chefName(){
        $chef = get_field('restaurant_chef');
        return $chef['0']->post_title;
    }

    public static function chefPermalink(){
        $chef = get_field('restaurant_chef');
        return get_permalink($chef[0]->ID);
    }

    public static function checkIfOpen(){
        $worksAllDay = get_field('works_all_day_long');
        if($worksAllDay){
            return true;
        }
        
        $opening = str_replace( ':', '', get_field('opens_from'));
        $closing = str_replace( ':', '', get_field('closes_at'));

        $currentTime = new DateTime(null, new DateTimeZone('Asia/Jerusalem'));
        $currentTime->setTimestamp(time());
        $currentTime = str_replace( ':', '', $currentTime->format('H:i'));

        if( $currentTime > $opening ){
            if( $currentTime < $closing ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
}
