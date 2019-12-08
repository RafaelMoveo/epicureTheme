<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleEpicureRestaurant extends Controller
{
    protected $acf = true;

    public static function getDishesByType($type){
        $mealTypes = get_field('meal');
        foreach( $mealTypes as $mealtype ){
            if( $mealtype == $type){
                $id = get_the_ID();
                return [
                    'id'          => $id,
                    'name'        => get_the_title(),
                    'ingredients' => get_field('ingredients'),
                    'type'        => get_field('food_type'),
                    'price'       => get_field('price'),
                    'permalink'   => get_permalink(),
                    'thumbnail'   => get_the_post_thumbnail_url( $id,'dish_list' ),
                    'asides'      => get_field('asides'),
                    'changes'     => get_field('changes'),
                ];
            }
        }
    }

}
