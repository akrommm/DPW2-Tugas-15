<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">

                </div><!-- End .header-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-dropdown header-right">
                    <a href="{{url('login')}}">
                        @if(Auth::check())
                        {{request()->user()->nama}}
                        @elseif(Auth::guard('pembeli')->check())
                        {{Auth::guard('pembeli')->user()->nama}}
                        @else
                        Silahkan Login
                        @endif
                    </a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Setting</a></li>
                            <li><a href="{{url('logout')}}">Logout</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('home') }}" class="logo">
                    <img src="{{ url('public') }}/assets/images/logo.png" alt="Molla Logo" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a href="{{ url('home') }}">Home</a>

                        </li>
                        <li>
                            <a href="{{ url('shop') }}">Shop</a>

                        </li>
                        <li class="nav-link {{request()->is('product') ? 'active' : ''}} ">
                            <a href="{{ url('product') }}">Product Detail</a>

                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" class="megamenu-container active" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>

                    </a>
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->