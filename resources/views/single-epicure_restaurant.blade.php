@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="single-restaurant">
    @while(have_posts()) 
    @php 
        the_post();
        $id = get_the_ID();
    @endphp
    <div class="row">
        <div class="col-12 restaurant-pic-div" style="background-image: url({{get_the_post_thumbnail_url( $id,'full' )}})">
        </div>
        <div class="col-12 text-center">
            <h1>{{ get_the_title() }}</h1>
            <p class="chef-name">{{ PageRestaurants::chefName() }}</p>
            @if (PageRestaurants::checkIfOpen())
                <p class="opening-hours">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                        <path fill="#000" fill-rule="nonzero" d="M6.5 0A6.503 6.503 0 0 0 0 6.5C0 10.088 2.912 13 6.5 13S13 10.088 13 6.5 10.088 0 6.5 0zm0 .31a6.188 6.188 0 0 1 6.194 6.19A6.192 6.192 0 0 1 6.5 12.694 6.192 6.192 0 0 1 .306 6.5 6.189 6.189 0 0 1 6.5.31zm2.524 4.423a.16.16 0 0 0-.05.023l-2.492 1.52-.018.01a.068.068 0 0 0-.01.004l-.004.005c-.002 0-.003.002-.005.004l-.004.005-.01.009-.004.004-.005.004-.004.01-.005.004-.004.005v.009l-.005.004-.004.01-.005.009v.013l-.005.004V10.986a.153.153 0 1 0 .306 0V6.503l2.438-1.488a.154.154 0 0 0-.11-.283v.001z"/>
                    </svg> 
                        <span> Open now </span>
                </p>
            @else
                <p class="opening-hours">
                    Opening Hours: <br>
                    {{ get_field('closes_at')}} - 
                    {{ get_field('opens_from')}}    
                </p>
            @endif
        </div>
    </div>
    @endwhile
        <div class="row">
            <div class="col-12 text-center meal-types-nav">
                <a href="#breakfast">Breakfast</a>
                <a href="#lunch">Lunch</a>
                <a href="#dinner">Dinner</a>
            </div>
        </div>
        @php
        $dishes = new WP_Query([
            'post_type' => 'epicure_dishes',
            'posts_per_page' => -1,
        ]);
        $breakfastDishes = [];
        $lunchDishes = [];
        $dinnerDishes = [];
        while($dishes->have_posts()){
            $dishes->the_post();
            if(get_field('restaurant')[0] == $id){
                ($dish = SingleEpicureRestaurant::getDishesByType('breakfast'))? $breakfastDishes[] = $dish : '';
                ($dish = SingleEpicureRestaurant::getDishesByType('lunch'))? $lunchDishes[] = $dish : '';
                ($dish = SingleEpicureRestaurant::getDishesByType('dinner'))? $dinnerDishes[] = $dish : '';
            }
        }
        wp_reset_postdata();
        @endphp
        <div class="row dishes-container">
            <div class="col-12">
                <div class="row"  id="breakfast">
                    @foreach($breakfastDishes as $dish)
                        @component('partials.dish-list', ['dish' => $dish])
                        @endcomponent
                    @endforeach
                </div>
                <div class="row"  id="lunch">
                    <div class="col-5">
                        <hr>
                    </div>
                    <div class="col-2 meal-div tex-center">
                        <span>LUNCH</span>
                    </div>
                    <div class="col-5">
                        <hr>
                    </div>
                    @foreach($lunchDishes as $dish)
                        @component('partials.dish-list', ['dish' => $dish])
                        @endcomponent
                    @endforeach
                </div>
                <div class="row"  id="dinner">
                    <div class="col-5">
                        <hr>
                    </div>
                    <div class="col-2 meal-div tex-center">
                        <span>DINNER</span>
                    </div>
                    <div class="col-5">
                        <hr>
                    </div>
                    @foreach($lunchDishes as $dish)
                        @component('partials.dish-list', ['dish' => $dish])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
