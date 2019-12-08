@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  <div class="home">

    <div class="container-fluid">
      <div class="row home-header-div" style="background-image: url({{get_the_post_thumbnail_url(get_the_ID(),'full')}})">
        <div class="col-12 text-center search-div">
          <p>
            {{get_field('search_label_text')}}
          </p>
          <div class="search-input-wrapper">
              @include('svg.shape')
            <input class="form-control" id="home-search" name="search" type="text" placeholder="Search for restaurant, cuisine, chef" aria-label="Search">
            <div id="autocomplete-items" class="d-none text-left">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row d-lg-none">
        <div class="col-12 p-0">
          <div class="home-nav-div">
              @php
                wp_nav_menu( array(
                  'container' => false,
                  'theme_location' => 'front-page-menu',
                  'items_wrap' => '%3$s',
                  'walker' => new FrontPageNav()
                ) ); 
              @endphp
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <p class="front-page-header">
              THE POPULAR RESTAURANTS IN EPICURE :
          </p>
        </div>

        {{-- Popular restaurants section --}}
        <div class="col-12 carousel-div">

          {{-- Get the popular restaurant field and display them --}}
          @php $popularRestaurants = get_field('popular_restaurants'); @endphp

            {{-- Mobile --}}
          <ul id="lightSlider-popular-restaurants" class="d-lg-none">
            @foreach($popularRestaurants as $restaurant)
            <li>
              <div class="head-img-div">
                @php echo get_the_post_thumbnail($restaurant,'home_popular_restaurant-mobile') @endphp
              </div>
              <div class="details-div text-center">
                <h2> {{ $restaurant->post_title }} </h2>
                <p> {{get_the_title(get_post_meta($restaurant->ID, 'restaurant_chef', true)[0])}} </p>
              </div>
            </li>
            @endforeach
          </ul>

          {{-- Desktop --}}
          <div class="row desktop-carousel d-none d-lg-flex">
              @foreach($popularRestaurants as $restaurant)
              <div class="col-4">
                <div class="head-img-div">
                  @php echo get_the_post_thumbnail($restaurant,'home_popular_restaurant-desktop') @endphp
                </div>
                <div class="details-div text-center">
                  <h2> {{ $restaurant->post_title }} </h2>
                  <p> {{get_the_title(get_post_meta($restaurant->ID, 'restaurant_chef', true)[0])}} </p>
                </div>
              </div>
              @endforeach
              <div class="col-12 text-right p-0">
                <a href="{{get_permalink( get_page_by_path('restaurants'))}}"> All Restaurants @include('svg.all-restaurants-arrows')  </a>
              </div>
          </div>
        </div>
      </div>
      <div class="row icons-meaning-div">
        <div class="col-12">
            <p class="front-page-header text-center">
                THE MEANING OF OUR ICONS :
            </p>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-4 spicy-div offset-lg-3 col-lg-2">
                @include('svg.spicy') 
            </div>
            <div class="col-4 text-center col-lg-2 ">
                @include('svg.vegetarian') 
            </div>
            <div class="col-4 vegan-div col-lg-2">
                @include('svg.vegan') 
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-4 icon-def spicy-div offset-lg-3 col-lg-2">
                <p>Spicy</p>
            </div>
            <div class="col-4 icon-def col-lg-2">
                <p>Vegitarian</p>
            </div>
            <div class="col-4 icon-def vegan-div col-lg-2">
                <p>Vegan</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row chef-of-the-week-div">
          <div class="col-12">
              <p class="front-page-header text-center">
                  CHEF OF THE WEEK :
              </p>
          </div>
          @php
            $chefsRestaurants = FrontPage::getChefsRestaurants($chef);
          @endphp
          <div class="col-12 col-md-6 col-lg-6 d-relative">
              @php echo get_the_post_thumbnail($chef,'home_chef') @endphp
              <div class="chef-name text-center">
                {{$chef->post_title}}
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 text-center chef-details-p">
            <p>{{$chef->post_content}}</p>
          </div>
          <div class="col-12">
            <p class="chefs-restaurants-p">{{FrontPage::getFirstName($chef)}} restaurants :</p>
          </div>
          <div class="col-12 chefs-rest-div d-lg-none">
              <ul id="lightSlider-chef-restaurants">
                @foreach( $chefsRestaurants as $restaurant )
                <li>
                  <div class="head-img-div">
                    @php echo $restaurant['thumbnail'] @endphp
                  </div>
                  <div class="details-div text-center">
                    <h2> {{ $restaurant['name'] }} </h2>
                  </div>
                </li>
                @endforeach
              </ul>
          </div>
          <div class="col-12 chefs-rest-div d-none d-lg-flex">
              <div class="chef-restaurants-desktop row">
                @foreach( $chefsRestaurants as $restaurant )
                <div class="col-3 restaurant-wrapper">
                    <div class="head-img-div">
                      @php echo $restaurant['thumbnail'] @endphp
                    </div>
                    <div class="details-div text-center">
                      <h2> {{ $restaurant['name'] }} </h2>
                    </div>
                </div>
                @endforeach
              </div>
          </div>
      </div>
      <div class="row about-us-div">
        <div class="col-12 col-lg-7 p-0">
          <div class="row">
            <div class="col-12 col-lg-6 about-us-header-div">
              <p class="front-page-header"> ABOUT US : </p>
            </div>
            <div class="col-12 about-us-content-div">
              <div class="about-us-p">
                {!!get_field('field_5dc28be3b7614')!!}
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5 p-0">
          <div class="row">
            <div class="col-12 text-center">
              <img class="site-logo" src="{{esc_url(get_field('site_logo'))}}" alt="site logo">
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5 p-0">
          <div class="row">
            <div class="col-5 col-md-12 col-lg-6 svg-wrapper offset-1 offset-lg-0">
              @include('svg.apple')               
            </div>
            <div class="col-5 col-md-12 col-lg-6 svg-wrapper">
                @include('svg.google')                
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>
  @endwhile
@endsection
