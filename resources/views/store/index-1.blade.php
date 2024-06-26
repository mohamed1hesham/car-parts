<!DOCTYPE html>
<html lang="en">


<!-- molla/index-1.html  22 Nov 2019 09:55:06 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Car-Parts</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/store/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/store/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/store/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/store/assets/images/icons/site.html">
    <link rel="mask-icon" href="/store/assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="/store/assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="/store/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="/store/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/store/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/store/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/store/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="/store/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/store/assets/css/style.css">
    <link rel="stylesheet" href="/store/assets/css/skins/skin-demo-2.css">
    <link rel="stylesheet" href="/store/assets/css/demos/demo-2.css">
</head>
<style>
    /* Basic reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header-right {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .top-menu {
        list-style-type: none;
        display: flex;
        gap: 1rem;
    }

    .header ul {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .header li {
        list-style-type: none;
    }

    .header a {
        text-decoration: none;
        color: #333;
        padding: 0.5rem 1rem;
        transition: background-color 0.3s, color 0.3s;
    }

    .header a:hover {
        background-color: #f8f8f8;
        color: #000;
    }

    .header a:active,
    .header a:focus {
        outline: none;
        background-color: #ddd;
    }

    .header a.logout {
        color: #d9534f;
    }

    .header a.logout:hover {
        background-color: #f2dede;
    }

    .header a.user-name {
        font-weight: bold;
    }

    /* Add some padding and background color to the header-right section */
    .header-right {
        padding: 0.5rem 1rem;
        background-color: #fff;
        border-bottom: 1px solid #eee;
    }

    /* Responsive styling */
    @media (max-width: 768px) {
        .top-menu {
            flex-direction: column;
            gap: 0.5rem;
        }

        .header-right {
            justify-content: center;
        }
    }
</style>

<body>
    <div class="page-wrapper">
        <header class="header header-2 header-intro-clearance">
            <div class="header-top" style="padding: 10px">
                <div class="container">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success ">{{ session('success') }}</div>
                    @endif
                    <div class="header-right">


                        <ul class="top-menu">
                            <li>
                                <ul class="header">
                                    @if (auth()->check())
                                        <li>
                                            <a href="#">
                                                {{ auth()->user()->name }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @else
                                        <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->


                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.html" class="logo">
                            <img src="/storeImages/logo.jpg" alt="Molla Logo" width="105" height="25">
                        </a>
                        <h3 style="margin-top: 10px">CarParts</h3>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div
                            class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q"
                                        placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit"><i
                                            class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">

                        <div class="dropdown cart-dropdown">
                            @if (auth()->check())
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <div class="icon">
                                        <i class="icon-shopping-cart"></i>
                                    </div>
                                    <p>Cart</p>
                                </a>
                            @endif


                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @php
                                        $totalPrice = 0; // Initialize total price variable
                                    @endphp
                                    @foreach ($cart as $cartItem)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">{{ $cartItem->product->name }}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">Price: </span>
                                                    {{ $cartItem->product->price }}
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="
                                                {{ asset('ProductImages/' . $cartItem->product->image) }}"
                                                        alt="product">
                                                </a>
                                            </figure>
                                            <form
                                                action="{{ route('cart.remove', ['productId' => $cartItem->product->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-remove" title="Remove Product"><i
                                                        class="icon-close"></i></button>
                                            </form>
                                        </div><!-- End .product -->
                                        @php
                                            $totalPrice += $cartItem->product->price; // Add product price to total
                                        @endphp
                                    @endforeach



                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">${{ $totalPrice }}</span>
                                </div><!-- End .dropdown-cart-total -->
                                <div class="dropdown-cart-action">
                                    <a href="{{ route('checkout') }}"
                                        class="btn btn-outline-primary-2"><span>Checkout</span>

                                        <i class="icon-long-arrow-right">

                                        </i>
                                    </a>

                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static"
                                title="Browse Categories">
                                Browse Categories
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        @foreach ($categories as $cat)
                                            <li><a href="#">{{ $cat->name }}</a></li>
                                        @endforeach
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li>
                                    <a href="{{ route('user.page') }}">Home</a>
                                </li>

                                <li>
                                    <a href="product.html">All Products</a>

                                </li>

                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        <i class="la la-lightbulb-o"></i>
                        <p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        <main class="main">
            <div class="intro-slider-container">
                <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl"
                    data-owl-options='{"nav": false}'>
                    <div class="intro-slide" style="background-image: url(/storeImages/c.jpg);">
                        <div class="container intro-content">
                            <h3 class="intro-subtitle">Bedroom Furniture</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Find Comfort <br>That Suits You.</h1><!-- End .intro-title -->


                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(/storeImages/c2.jpg);">
                        <div class="container intro-content">


                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(/storeImages/c1.jpg);">
                        <div class="container intro-content">

                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .owl-carousel owl-simple -->

                <span class="slider-loader text-white"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <div class="brands-border owl-carousel owl-simple" data-toggle="owl"
                data-owl-options='{
                    "nav": false, 
                    "dots": false,
                    "margin": 0,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        },
                        "1360": {
                            "items":7
                        }
                    }
                }'>
                <a href="#" class="brand">
                    <img src="/store/assets/images/brands/1.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="/store/assets/images/brands/2.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="/store/assets/images/brands/3.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="/store/assets/images/brands/4.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="/store/assets/images/brands/5.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="/store/assets/images/brands/6.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="/store/assets/images/brands/7.png" alt="Brand Name">
                </a>
            </div><!-- End .owl-carousel -->

            <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

            <div class="banner-group">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-5">
                            <div class="banner banner-large banner-overlay banner-overlay-light">
                                <a href="#">
                                    <img src="/storeImages/p1.jpg" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-top">
                                    <h4 class="banner-subtitle"></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title"> </h3><!-- End .banner-title -->
                                    <div class="banner-text"></div><!-- End .banner-text -->
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-5 -->

                        <div class="col-md-6 col-lg-3">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="/storeImages/p2.jpg" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-bottom">
                                    <h4 class="banner-subtitle text-grey"></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"> <br></h3>
                                    <!-- End .banner-title -->
                                    <div class="banner-text text-white"></div><!-- End .banner-text -->

                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-md-6 col-lg-4">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="/storeImages/p3.jpg" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-top">
                                    <h4 class="banner-subtitle text-grey"></h4>
                                    <!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"> <br></h3>
                                    <!-- End .banner-title -->
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->

                            <div class="banner banner-overlay banner-overlay-light">
                                <a href="#">
                                    <img src="/storeImages/p4.jpg" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-top">
                                    <h4 class="banner-subtitle">On Sale</h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title">Lamps Offer</h3><!-- End .banner-title -->
                                    <div class="banner-text">up to 30% off</div><!-- End .banner-text -->
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .banner-group -->

            <div class="mb-3"></div><!-- End .mb-6 -->

            <div class="container">
                <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="products-featured-link" data-toggle="tab"
                            href="#products-featured-tab" role="tab" aria-controls="products-featured-tab"
                            aria-selected="true">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab"
                            role="tab" aria-controls="products-sale-tab" aria-selected="false">On Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="products-top-link" data-toggle="tab" href="#products-top-tab"
                            role="tab" aria-controls="products-top-tab" aria-selected="false">Top Rated</a>
                    </li>
                </ul>
            </div><!-- End .container -->

            <div class="container-fluid">
                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel"
                        aria-labelledby="products-featured-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                            data-toggle="owl"
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($getFeaturedData as $value)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product', $value->id) }}">
                                            <img src="{{ asset('ProductImages/' . $value->image) }}"
                                                alt="Product image" class="product-image">
                                            <img src="{{ asset('ProductImages/' . $value->image) }}"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a
                                                href="{{ route('product', $value->id) }}">{{ $value->name }}</a>
                                        </h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            {{ $value->price }} EGP
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <form action="{{ route('addToCart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $value->id }}">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <button type="submit" class="btn-product btn-cart"><span>add to
                                                    cart</span></button>
                                        </form>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->

                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel"
                        aria-labelledby="products-sale-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                            data-toggle="owl"
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($getOnSaledData as $value)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product', $value->id) }}">
                                            <img src="
            {{ asset('ProductImages/' . $value->image) }}"
                                                alt="Product image" class="product-image">
                                            <img src="
            {{ asset('ProductImages/' . $value->image) }}"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->

                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a
                                                href="{{ route('product', $value->id) }}">{{ $value->name }}</a>
                                        </h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            {{ $value->price }}$
                                        </div><!-- End .product-price -->

                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <form action="{{ route('addToCart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $value->id }}">
                                            @if (auth()->user())
                                                <input type="hidden" name="user_id"
                                                    value="{{ auth()->user()->id }}">
                                            @endif
                                            <button type="submit" class="btn-product btn-cart"><span>add to
                                                    cart</span></button>
                                        </form>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="products-top-tab" role="tabpanel"
                        aria-labelledby="products-top-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                            data-toggle="owl"
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($getTopRatedData as $value)
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product', $value->id) }}">
                                            <img src="{{ asset('ProductImages/' . $value->image) }}"
                                                alt="Product image" class="product-image">
                                            <img src="{{ asset('ProductImages/' . $value->image) }}"
                                                alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"><span>add to
                                                    wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a
                                                href="{{ route('product', $value->id) }}"">{{ $value->name }}</a></a>
                                        </h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            {{ $value->price }}$
                                        </div><!-- End .product-price -->


                                    </div><!-- End .product-body -->

                                    <div class="product-action">
                                        <form action="{{ route('addToCart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $value->id }}">



                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                                            <button type="submit" class="btn-product btn-cart"><span>add to
                                                    cart</span></button>
                                        </form>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            @endforeach



                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container-fluid -->

            <div class="mb-5"></div><!-- End .mb-5 -->


            <div class="mb-6"></div><!-- End .mb-6 -->


        </main><!-- End .main -->

        <footer class="footer footer-2">
            <div class="icon-boxes-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                    <p>orders $50 or more</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                    <p>within 30 days</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                    <p>When you sign up</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                    <p>24/7 amazing services</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->


            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="widget widget-about">
                                <img src="/storeimages/logo.jpg" class="footer-logo" alt="Footer Logo"
                                    width="105" height="25">
                                <p>
                                    Welcome to CarParts, your ultimate destination for high-quality car parts and
                                    accessories. Whether you're a car enthusiast, a professional mechanic, or a DIY car
                                    owner, CarParts is designed to meet all your automotive needs. We offer an extensive
                                    range of parts for various makes and models, ensuring you find exactly what you need
                                    to keep your vehicle running smoothly and looking great.

                                    At CarParts, we are committed to providing a seamless shopping experience. Our
                                    user-friendly interface, detailed product information, and secure checkout process
                                    make it easy for you to find and purchase the right parts quickly and efficiently.
                                    With our expert customer support and comprehensive selection, you can trust us to be
                                    your reliable partner in all things automotive.

                                    Explore our website today and discover the perfect parts and accessories to enhance
                                    your vehicle's performance and style. Thank you for choosing CarParts – where
                                    quality and service drive us forward.
                                </p>

                                <div class="widget-about-info">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <span class="widget-about-title">Got Question? Call us 24/7</span>
                                            <a href="tel:123456789">+0123 456 789</a>
                                        </div><!-- End .col-sm-6 -->
                                        <div class="col-sm-6 col-md-8">
                                            <span class="widget-about-title">Payment Method</span>
                                            <figure class="footer-payments">
                                                <img src="/store/assets/images/payments.png" alt="Payment methods"
                                                    width="272" height="20">
                                            </figure><!-- End .footer-payments -->
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .widget-about-info -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-12 col-lg-3 -->


                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p>
                    <!-- End .footer-copyright -->
                    <ul class="footer-menu">
                        <li><a href="#">Terms Of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul><!-- End .footer-menu -->

                    <div class="social-icons social-icons-color">
                        <span class="social-label">Social Media</span>
                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i
                                class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i
                                class="icon-twitter"></i></a>
                        <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i
                                class="icon-instagram"></i></a>
                        <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i
                                class="icon-youtube"></i></a>
                        <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i
                                class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                    placeholder="Search product ..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab"
                        role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab"
                        role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>


            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                        class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                        class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                        class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                        class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register"
                                        role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">
                                    <form action="{{ route('post_login') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="signin-email">Username or Email Address *</label>
                                            <input type="text" class="form-control" id="signin-email"
                                                name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="signin-password">Password *</label>
                                            <input type="password" class="form-control" id="signin-password"
                                                name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel"
                                    aria-labelledby="register-tab">
                                    <form action="{{ route('register') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email"
                                                name="email" required>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="register-password">Name</label>
                                            <input type="text" class="form-control" id="register-password"
                                                name="name" required>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password"
                                                name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password-confirmation">Confirm Password *</label>
                                            <input type="password" class="form-control"
                                                id="register-password-confirmation" name="password_confirmation"
                                                required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- .End .tab-pane -->

                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


    <!-- Plugins JS File -->
    <script src="/store/assets/js/jquery.min.js"></script>
    <script src="/store/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/store/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="/store/assets/js/jquery.waypoints.min.js"></script>
    <script src="/store/assets/js/superfish.min.js"></script>
    <script src="/store/assets/js/owl.carousel.min.js"></script>
    <script src="/store/assets/js/jquery.plugin.min.js"></script>
    <script src="/store/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/store/assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="/store/assets/js/main.js"></script>
    <script src="/store/assets/js/demos/demo-2.js"></script>
</body>


<!-- molla/index-1.html  22 Nov 2019 09:55:32 GMT -->

</html>
