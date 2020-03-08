<!DOCTYPE html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Seosight - Shop</title>

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>


<body class=" ">

    <header class="header" id="site-header">

        <div class="container">

            <div class="header-content-wrapper">
               <a style="border: solid;padding: 7px;border-radius: 15px;" class="text-capitalize" href="{{route('index')}}">HOME STORE</a> 
                <ul class="nav-add" style="padding: 0!important">
                
                    <li class="cart">

                        <a href="#" class="js-cart-animate">
                            <i class="seoicon-basket"></i>
                            <span class="cart-count">{{Cart::content()->count()}}</span>
                        </a>

                        <div class="cart-popup-wrap">
                            <div class="popup-cart">
                                @if (Cart::content()->count()==0)

                                <h4 class="title-cart">No products in the cart!</h4>
                                <p class="subtitle">Please make your choice.</p>
                                @else
                            <h4 class="title-cart align-center">Total : ${{Cart::total()}}</h4>
                            <br>    
                            <a href="{{route('cart')}}">
                                    <div class="btn btn-small btn--dark">
                                        <span class="text">View Cart</span>
                                    </div>
                                </a>
                                @endif


                            </div>
                        </div>

                    </li>
                </ul>
            </div>

        </div>

    </header>


    <div class="content-wrapper">

        <div class="container">
            <div class="row pt120">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="heading align-center">
                        <h4 class="h1 heading-title">E-commerce System Project</h4>
                        {{-- <p class="heading-text">Buy books, and we ship to you.
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- End Books products grid -->

        @yield('page')
    </div>

    <!-- Footer -->

    <footer class="footer" style="padding-top: 90px !important;">
        
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>
                            FaridDomat - 2020 <br>
                            +963934538775 <br>
                            fariddomat.000@gmail.com <br><br>
                        </p>
                    </div>
                </div>
            </div>
        
    </footer>



    <script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
    <script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
    <script src="{{asset('app/js/theme-plugins.js')}}"></script>
    <script src="{{asset('app/js/main.js')}}"></script>
    <script src="{{asset('app/js/form-actions.js')}}"></script>

    <script src="{{asset('app/js/velocity.min.js')}}"></script>
    <script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('app/js/animation.velocity.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('success')) 
            toastr.success('{{Session::get('success')}}');    
        @endif
    </script>

    <!-- ...end JS Script -->


</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->

</html>