        <!-- Header Area Start -->
        <header class="header header-fullwidth header-style-4">
            <div class="header-inner fixed-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-4 order-1">
                            <div class="header-left d-flex">
                                <!-- Logo Start Here -->
                                <a href="{{route('home')}}" class="logo-box">
                                    <figure class="logo--normal"> 
                                        <img src="assets/img/logo/logo.svg" alt="Logo"/>   
                                    </figure>
                                    <figure class="logo--transparency">
                                        <img src="assets/img/logo/logo-white.png" alt="Logo"/>  
                                    </figure>
                                </a>
                                <!-- Logo End Here -->

                                <ul class="header-toolbar">
                                    <li class="header-toolbar__item d-none d-lg-block">
                                        <a href="#sideNav" class="toolbar-btn">
                                            <i class="dl-icon-menu2"></i>
                                        </a>                                    
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-8 order-3 order-lg-2">
                            <!-- Main Navigation Start Here -->
                            <nav class="main-navigation">
                                <ul class="mainmenu mainmenu--centered">
                                    <li class="mainmenu__item menu-item-has-children megamenu-holder">
                                        <a href="{{route('home')}}" class="mainmenu__link">
                                            <span class="mm-text">Home</span>
                                        </a>
                                    </li>
                                    <li class="mainmenu__item menu-item-has-children">
                                        <a href="{{route('list.products',['id'=>'all'])}}" class="mainmenu__link">
                                            <span class="mm-text">Shopping</span>
                                        </a>
                                        <ul class="megamenu four-column">
                                            @foreach ($menus as $items)                                               
                                            <li>
                                                <a class="megamenu-title" href="javascript:;">
                                                    <span class="mm-text">{{$items->name}}</span>
                                                </a>
                                                <ul>
                                                    @if(count($items->RelationshipCategoriesChild) > 0)

                                                        @foreach($items->RelationshipCategoriesChild as $mnc)

                                                            @if($mnc->active==1)
                                                                <li>
                                                                    <a href="{{route('list.products',[ 'id'=>$mnc->id ])}}">
                                                                        <span class="mm-text">{{$mnc->name}}</span>
                                                                    </a>
                                                                </li>
                                                            @endif

                                                        @endforeach

                                                    @endif
                                                </ul>
                                            </li>
                                            @endforeach
                                            <li class="d-none d-lg-block banner-holder">
                                                <div class="megamenu-banner">
                                                    <div class="megamenu-banner-image"></div>
                                                    <div class="megamenu-banner-info">
                                                        <span>
                                                            <a href="shop-sidebar.html">Man</a>
                                                            <a href="shop-sidebar.html">shoes</a>
                                                        </span>
                                                        <h3>new <strong>season</strong></h3>
                                                    </div>
                                                    <a href="shop-sidebar.html" class="megamenu-banner-link"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mainmenu__item">
                                        <a href="javascript:;" class="mainmenu__link">
                                            <span class="mm-text">Collections</span>
                                        </a>
                                    </li>
                                    <li class="mainmenu__item menu-item-has-children has-children">
                                        <a href="javascript:;" class="mainmenu__link">
                                            <span class="mm-text">Blog</span>
                                            <span class="tip">CommingSoon</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- Main Navigation End Here -->
                        </div>

                        <div class="col-lg-2 col-md-9 col-8 order-2 order-lg-3">
                            <ul class="header-toolbar text-right">
                                @if(Auth::user())
                                <li class="header-toolbar__item user-info-menu-btn">
                                    <a href="javascript:;">
                                        <i class="fa fa-user-circle-o"></i>
                                    </a>
                                    <ul class="user-info-menu">
                                        <li>
                                        <a href="javascript:;">{{Auth::user()->name}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('logout')}}">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                <li class="header-toolbar__item user-info-menu-btn">
                                    <a href="{{route('login')}}">Login
                                    </a>
                                </li>
                                @endif
                                <li class="header-toolbar__item">
                                    <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                        <i class="dl-icon-cart4"></i>
                                        <sup class="mini-cart-count">2</sup>
                                    </a>
                                </li>
                                <li class="header-toolbar__item">
                                    <a href="#searchForm" class="search-btn toolbar-btn">
                                        <i class="dl-icon-search1"></i>
                                    </a>
                                </li>
                                <li class="header-toolbar__item d-lg-none">
                                    <a href="javascript:;" class="menu-btn"></a>                 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Mobile Header area Start -->
        <header class="header-mobile">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-4">
                        <a href="{{route('home')}}" class="logo-box">
                            <figure class="logo--normal">
                                <img src="assets/img/logo/logo.svg" alt="Logo">
                            </figure>
                        </a>
                    </div>
                    <div class="col-8">
                        <ul class="header-toolbar text-right">
                            @if(Auth::user())
                                <li class="header-toolbar__item user-info-menu-btn">
                                    <a href="javascript:;">
                                        <i class="fa fa-user-circle-o"></i>
                                    </a>
                                    <ul class="user-info-menu">
                                        <li>
                                        <a href="javascript:;">{{Auth::user()->name}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('logout')}}">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                <li class="header-toolbar__item user-info-menu-btn">
                                    <a href="{{route('login')}}">Login
                                    </a>
                                </li>
                                @endif
                            <li class="header-toolbar__item">
                                <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                    <i class="dl-icon-cart4"></i>
                                    <sup class="mini-cart-count">2</sup>
                                </a>
                            </li>
                            <li class="header-toolbar__item">
                                <a href="#searchForm" class="search-btn toolbar-btn">
                                    <i class="dl-icon-search1"></i>
                                </a>
                            </li>
                            <li class="header-toolbar__item d-lg-none">
                                <a href="javascript:;" class="menu-btn"></a>                 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Mobile Navigation Start Here -->
                        <div class="mobile-navigation dl-menuwrapper" id="dl-menu">
                            <button class="dl-trigger">Open Menu</button>
                            <ul class="dl-menu">
                                <li>
                                    <a href="{{route('home')}}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('list.products',['id'=>'all'])}}">
                                            Shopping
                                        <span class="tip">Hot</span>
                                    </a>
                                    <ul class="dl-submenu">
                                        @foreach($menus as $items)
                                        <li>
                                            <a class="megamenu-title" href="javascript:;">
                                                {{$items->name}}
                                            </a>
                                            <ul class="dl-submenu">
                                                @if(count($items->RelationshipCategoriesChild) > 0)

                                                        @foreach($items->RelationshipCategoriesChild as $mnc)

                                                            @if($mnc->active==1)
                                                                <li>
                                                                    <a href="{{route('list.products',[ 'id'=>$mnc->id ])}}">
                                                                        <span class="mm-text">{{$mnc->name}}</span>
                                                                    </a>
                                                                </li>
                                                            @endif

                                                        @endforeach
                                                        
                                                    @endif
                                            </ul>
                                        </li>
                                        @endforeach
                                        <li class="d-none d-lg-block banner-holder">
                                            <div class="megamenu-banner">
                                                <div class="megamenu-banner-image"></div>
                                                <div class="megamenu-banner-info">
                                                    <span>
                                                        <a href="shop-sidebar.html">woman</a>
                                                        <a href="shop-sidebar.html">shoes</a>
                                                    </span>
                                                    <h3>new <strong>season</strong></h3>
                                                </div>
                                                <a href="shop-sidebar.html" class="megamenu-banner-link"></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop-sidebar.html">
                                        Collections
                                    </a>
                                </li>
                                <li>
                                    <a href="blog.html">
                                        Pages
                                    </a>
                                    <ul class="dl-submenu">
                                        <li>
                                            <a href="about-us.html">
                                                About Us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="team.html">
                                                Our teams
                                            </a>
                                        </li>
                                        <li>
                                            <a href="contact-us.html">
                                                Contact us 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="contact-us-02.html">
                                                Contact us 2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="404.html">
                                                404 page
                                            </a>
                                        </li>
                                        <li>
                                            <a href="faqs-page.html">
                                                FAQs page
                                            </a>
                                        </li>
                                        <li>
                                            <a href="coming-soon.html">
                                                Coming Soon
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html">
                                        Blog
                                    </a>
                                    <ul class="dl-submenu">
                                        <li>
                                            <a href="javascript:;">
                                                Blog Grid
                                            </a>
                                            <ul class="dl-submenu">
                                                <li>
                                                    <a href="blog-02-columns.html">
                                                        <span class="mm-text">Blog 02 Column</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-03-columns.html">
                                                        <span class="mm-text">Blog 02 Column</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Blog List
                                            </a>
                                            <ul class="dl-submenu">
                                                <li>
                                                    <a href="blog.html">
                                                        <span class="mm-text">Blog Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-standard.html">
                                                        <span class="mm-text">Blog Standard</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-no-sidebar.html">
                                                        <span class="mm-text">Blog No Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="blog-masonary.html">
                                                Blog Masonary
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Blog Details
                                            </a>
                                            <ul class="dl-submenu">
                                                <li>
                                                    <a href="single-post.html">
                                                        <span class="mm-text">Single Post</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-post-sidebar.html">
                                                        <span class="mm-text">Single Post Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop-instagram.html">
                                        New Look
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Mobile Navigation End Here -->
                    </div>
                </div>
            </div>
        </header>
        <!-- Mobile Header area End -->