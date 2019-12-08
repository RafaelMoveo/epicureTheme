<div class="container-fluid mobile-nav">
    <nav class="navbar row navbar-light d-lg-none">
        <div class="col-2">
            <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
            aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon1"><span></span><span></span><span></span></div>
            </button>
        </div>
        <div class="col-2 offset-3 offset-md-4">
            <a class="navbar-brand" href="{{ esc_url(home_url()) }}">
            <img src="{{get_template_directory_uri().'/assets/images/logo@3x.jpg'}}" alt="site logo"/>
            </a>
        </div>
        <div class="col-5 col-md-4">
            <div class="row">
                <div class="col-4 nav-search-i-div">
                    <a href="#">
                        @include('svg.shape')
                    </a>
                </div>
                <div class="col-4 nav-user-i-div">
                    <a href="#">
                        @include('svg.user-icon')
                    </a>
                </div>
                <div class="col-4 nav-cart-i-div">
                    <a class="position-relative cart-btn">
                        @include('svg.cart')
                        <div class="cart-items-div text-center d-none">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse d-lg-none navbar-collapse" id="navbarSupportedContent20">
            @php
                wp_nav_menu( array(
                        'theme_location' => 'pages',
                        'menu_class'     => 'mobile-nav-pages',
                        'walker' => new MobileMainNav()
                        ) );    
                wp_nav_menu( array(
                        'theme_location' => 'actions',
                        'menu_class'     => 'mobile-nav-actions',
                        'walker' => new MobileMainNav()
                        ) );    
            @endphp
        </div>
    </nav>
</div>