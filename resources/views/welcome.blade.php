<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Survey System</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/pe-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js')}}"></script>
   
    <script type="text/javascript">
    jQuery(document).ready(function($){
	'use strict';
      	jQuery('body').backstretch([
	        "images/bg/bg1.jpg",
	        "images/bg/bg2.jpg",
	        "images/bg/bg3.jpg"
	    ], {duration: 5000, fade: 500, centeredY: true });

		$("#mapwrapper").gMap({ controls: false,
         	scrollwheel: false,
         	markers: [{
              	latitude:40.7566,
				longitude: -73.9863,
          	icon: { image: "images/marker.png",
              	iconsize: [44,44],
          		iconanchor: [12,46],
          		infowindowanchor: [12, 0] } }],
          	icon: {
              	image: "images/marker.png",
             	iconsize: [26, 46],
              	iconanchor: [12, 46],
              	infowindowanchor: [12, 0] },
         	latitude:40.7566,
         	longitude: -73.9863,
          	zoom: 14 });
    });
    </script>
</head><!--/head-->
<body>
<div id="preloader"></div>
    <header class="navbar navbar-inverse navbar-fixed-top " role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                 <a class="navbar-brand" href="{{ url('/') }}"><h1><span class="pe-7s-gleam bounce-in"></span>SURVEY_SYSTEM</h1></a>
            </div>
            <div class="collapse navbar-collapse ">
            
                <!--<ul class="nav navbar-nav navbar-right ">-->
                <div class="flex-center position-ref full-height nav navbar-nav navbar-right ">
                
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <!--<a  href="{{ url('/home') }}">Home</a>-->
                        <span style="color:white" class="text-white">Your are now logged in</span>
                    @else
                        <a style="color:white;font-weight:bold;margin-right:7px; padding-top:10px" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a style="color:white;font-weight:bold;margin-left:7px;" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
         <!--end of authentication div-->
                <!--
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact-us.html">Contact</a></li>
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="project-item.html">Project Single</a></li>
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li class="active"><a href="404.html">404</a></li>
                        </ul>
                    </li>
                    <li><span class="search-trigger"><i class="fa fa-search"></i></span></li></ul>-->
                
            </div>
        </div>
    </header><!--/header-->
   <!-- login div-->
   
    <section id="main-slider" class="no-margin">
        <div class="carousel slide" data-ride="carousel">
          
            <div class="carousel-inner">
                <div class="item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content center centered">
                                	<span class="home-icon pe-7s-gleam bounce-in"></span>
                                    <h2 class="boxed animation animated-item-1 fade-down">ONLINE SURVEY FOR SCHOOL OF COMPUTING AND TECHNOLOGY</h2>
                                    <p class="boxed animation animated-item-2 fade-up">Survey for all courses in school of computing and technology.</p>
                                    <br>
                                    <a class="btn btn-md animation bounce-in" href="{{ url('/home') }}">courses</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->

    <div id="content-wrapper">
        <section id="services" class="white">
        <div class="container">
                    <div class="center gap fade-down section-heading">
                   		<div class="gap"></div>
                        <h2 class="main-title">Important note</h2>
                      
                        <hr>
                        <p>click on the courses button above to proceed to view all your courses thanks!</p>
                    </div>
                   
                
           </section>


		  <section id="single-quote" class="divider-section">
	            <div class="container">
	            	<div class="gap"></div>
	                <div class="row">
	                    <div class='col-md-offset-2 col-md-8 fade-up'>
	                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
	                            <div class="carousel-inner">
	                                <div class="item active">
	                                    <blockquote>
	                                        <div class="row">
	                                            <div class="col-sm-3 text-center">
	                                                
	                                            </div>
	                                            <div class="col-sm-9">
	                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
	                                                <small>Lupa</small>
	                                            </div>
	                                        </div>
	                                    </blockquote>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="gap"></div>
	      		</div>
  		</section>

       
        <footer id="footer" class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        &copy; 2019 Your Site Name. All Rights Reserved. <a href="https://templatemag.com/bootstrap-templates/">Bootstrap templates</a> by TemplateMag.
                    </div>
                    <div class="col-sm-4">
                        <ul class="pull-right">
                            <li><a id="gototop" class="gototop" href="#"><i class="fa fa-chevron-up"></i></a></li><!--#gototop-->
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->
    </div>


    <script src="{{ asset('js/plugins.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWDPCiH080dNCTYC-uprmLOn2mt2BMSUk&amp;sensor=true"></script>
    <script src="{{ asset('js/init.js')}}"></script>
</body>
</html>