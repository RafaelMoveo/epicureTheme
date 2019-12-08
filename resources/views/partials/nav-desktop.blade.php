<div class="desktop-nav-container">
    <nav class="navbar row navbar-light d-none d-lg-flex desktop-nav p-0 m-0">
        <div class="col-2 text-right p-2">
            <a class="navbar-brand" href="{{ esc_url(home_url()) }}">
                <img src="{{get_template_directory_uri().'/assets/images/logo@3x.jpg'}}" alt="site logo"/>
                <span class="site-log"> {{get_bloginfo('name')}} </span>
            </a>
        </div>
        <div class="col-4 pl-lg-5 p-xl-0">
            @php
                wp_nav_menu( array(
                    'theme_location' => 'pages',
                    'walker' => new DesktopPagesMenu()
                ) ); 
            @endphp
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-10 nav-search-i-div">
                    <div class="input-group position-relative mb-3">
                        <input type="text" id="nav-search" class="form-control" placeholder="Search for restaurant cuisine, chef">
                        @include('svg.shape')
                        <div id="autocomplete-nav-items" class="d-none text-left">
                        </div>
                    </div>
                </div>
                <div class="col-1 nav-user-i-div">
                    <a href="#">
                        @include('svg.user-icon')
                    </a>
                </div>
                <div class="col-1 nav-cart-i-div">
                    <a class="position-relative cart-btn">
                        @include('svg.cart')
                        <div class="cart-items-div text-center d-none">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    
        <div class="collapse navbar-collapse">
            @php   
                wp_nav_menu( array(
                        'theme_location' => 'actions',
                        'menu_class'     => 'mobile-nav-actions',
                        'walker' => new MobileMainNav()
                        ) );    
            @endphp
        </div>
    </nav>
</div>