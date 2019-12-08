<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
    protected $acf = true;

    public static function getFirstName($chef){
        $firstName = explode(' ', $chef->post_title)[0];
        return $firstName."'s";
    }

    public function Chef(){
        return get_field('chef_of_the_week')[0];
    }

    public static function getChefsRestaurants($chef){
        $allRestaurants = new \WP_Query(array(
            'post_type' => 'epicure_restaurant'
        ));
        $chefsRestaurants = [];

        while($allRestaurants->have_posts()){
            $allRestaurants->the_post();
            $RestaurantChefId = get_field('restaurant_chef', false, false)[0];
            if( $RestaurantChefId == $chef->ID){
                $id = get_the_ID();
                $restaurant = [
                    'id'        => $id,
                    'thumbnail' => get_the_post_thumbnail($id, 'home_chef_restaurant'),
                    'name'      => get_the_title($id),
                ];
                $chefsRestaurants[] = $restaurant;
            }  
        }
        wp_reset_postdata();

        return $chefsRestaurants;
    }
}
