@extends('layouts.app')

@section('content')
<div class="container">
    <div class="all-restaurants">
        @while(have_posts()) @php the_post() @endphp
            <div class="row d-md-none">
                <div class="col-12 text-center page-title-div">
                    <h1>{{ strtoupper( get_the_title() ) }}</h1>
                </div>
            </div>
        @endwhile
        <div class="row restaurants-nav">
            <div class="col-12 text-center p-0">
                <a href="#">All</a>
                <a href="#">New</a>
                <a href="#">Most Popular</a>
                <a href="#">Open Now</a>
            </div>
        </div>
        <div class="row">
            @php
                $restaurants = new WP_Query(array(
                    'post_type' => 'epicure_restaurant',
                    'posts_per_page' => 200,
                ));
                
                while($restaurants->have_posts()): $restaurants->the_post();
            @endphp
            <div class="col-6 col-md-4">
                <div>
                    <a href="{{get_permalink()}}">
                        {{the_post_thumbnail('restaurant_list')}}
                    </a>
                </div>
                <div class="text-center restaurant-name-div">
                    <a href="{{get_permalink()}}">
                        <h2>{{get_the_title()}}</h2>
                    </a>
                    <a href="{{ PageRestaurants::chefPermalink() }}">
                        <h4>{{ PageRestaurants::chefName() }}</h4>
                    </a>
                </div>
            </div>
            @php endwhile; wp_reset_postdata(); @endphp
        </div>
    </div>
</div>
@endsection
