<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name') }}</title>
     <!-- DEFAULT META TAGS -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <!-- FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lora:400italic,700italic" rel="stylesheet" type="text/css">
    
    <!-- CSS -->
    <link rel="stylesheet" id="default-style-css"  href="/files/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" id="fontawesome-style-css" href="/files/css/font-awesome.min.css" type="text/css" media="all" />
    <link rel="stylesheet" id="ionic-icons-style-css" href="/files/css/ionicons.css" type="text/css" media="all" />
	<link rel="stylesheet" id="isotope-style-css"  href="/files/css/isotope.css" type="text/css" media="all" />
    <link rel="stylesheet" id="mqueries-style-css"  href="/files/css/mqueries.css" type="text/css" media="all" />
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="/files/uploads/favicon.png"/>

</head>
<body>
<!-- PAGE CONTENT -->
<div id="page-content">

	<!-- HEADER -->
	<header id="header" class="header-bordered header-transparent transparent-light">        
		<div class="header-inner clearfix">
			
            <!-- LOGO -->
            <div id="logo" class="left-float">
                <a href="{{ url('/')}}">
                	<img id="scroll-logo" src="/files/uploads/logo-sudo-scroll.png" srcset="/files/uploads/logo-sudo-scroll.png 1x, files/uploads/logo-sudo-scroll@2x.png 2x" alt="Logo Scroll">
                	<img id="dark-logo" src="/files/uploads/logo-sudo-dark.png" srcset="/files/uploads/logo-sudo-dark.png 1x, files/uploads/logo-sudo-dark@2x.png 2x" alt="Logo Dark">
                	<img id="light-logo" src="/files/uploads/logo-sudo-light.png" srcset="/files/uploads/logo-sudo-light.png 1x, files/uploads/logo-sudo-light@2x.png 2x" alt="Logo Light">
                </a>
            </div>
            
            <!-- MAIN NAVIGATION -->
            <div id="menu" class="right-float">
    			<a href="#" class="responsive-nav-toggle"><span class="hamburger"></span></a>
                <div class="menu-inner">
                    <nav id="main-nav">
                        <ul>
                            @if (Route::has('login'))
                                    @auth
                                    <li class="menu-item-has-children">
                                        <a href="{{ url('/home') }}">Painel</a>
                                    </li>
                                    @else
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('register') }}">Register</a>
                                    </li>
                                    @endauth
                            @endif                            
                        </ul>
                    </nav>
                    
                    <div id="menu-misc" class="clearfix">    
                        
                        <!-- HEADER SEARCH -->
                        <div id="header-search">
                            <a href="#" id="show-search"><i class="fa fa-search"></i></a>
                            <div class="header-search-content">
                                <form action="http://www.spab-rice.com/themeforest/sudo/demo/search.html" method="get">
                                    <a href="#" id="close-search"></a>
                                    <input type="text" name="q" class="form-control" value="" placeholder="Enter your search ...">
                                    <h5 class="subtitle-1">... & press enter to start</h5>
                                </form>
                                <div class="search-outer"></div>
                            </div>
                        </div>
                        
                    </div><!-- END #menu-misc -->
                </div><!-- END .menu-inner -->
            </div><!-- END #menu -->
            
		</div> <!-- END .header-inner -->
	</header>

    @yield('content')
       
    <!-- FOOTER -->  
    <footer id="footer" class="footer-dark text-light">
       	<div class="footer-inner wrapper">
       
            <div class="column-section clearfix">
            	<div class="column two-fifth">
                	<div class="widget">
                    	<img src="/files/uploads/logo-sudo-light.png" srcset="/files/uploads/logo-sudo-light.png 1x, files/uploads/logo-sudo-light@2x.png 2x" alt="Logo">
                        <div class="spacer-mini"></div>
                        <p>Este desafio tem a finalidade de qualificar você que quer ser um integrante do time de desenvolvimento da AGV, como um Desenvolvedor WEB PHP FULL-STACK.</p>
                    </div>
                    
                     <div class="widget">
                        <ul class="socialmedia-widget hover-fade-1">
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="dribbble"><a href="#"></a></li>
                            <li class="behance"><a href="#"></a></li>
                            <li class="instagram"><a href="#"></a></li>
                        </ul>
                    </div>
                    
                </div>
            	<div class="column one-fifth">
                	<div class="widget">
                    	<h6 class="widget-title uppercase">Quick Menu</h6>
                        <ul class="menu">
                        	<li><a href="#">About Us</a></li>
                        	<li><a href="#">Portfolio</a></li>
                        	<li><a href="#">Our Team</a></li>
                        	<li><a href="#">Support</a></li>
                        	<li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            	<div class="column one-fifth">
                	<div class="widget">
                    	<h6 class="widget-title uppercase">Categories</h6>
                        <ul class="menu">
                        	<li><a href="#">Design</a></li>
                        	<li><a href="#">Graphic</a></li>
                        	<li><a href="#">Stories</a></li>
                        	<li><a href="#">Photography</a></li>
                        	<li><a href="#">Video</a></li>
                        </ul>
                    </div>
                </div>
            	<div class="column one-fifth last-col">
                	<div class="widget widget_recent_entries">	
                        <h6 class="widget-title uppercase">Recent Posts</h6>
                        <ul>
                            <li><a href="#">Waterfalls of Iceland</a><span class="post-date">5 hours ago</span></li>
                            <li><a href="#">Minimal Interior Elements</a><span class="post-date">11 hours ago</span></li>
                            <li><a href="#">Birds flying around</a><span class="post-date">1 day ago</span></li>
                        </ul>
                    </div>
                </div>
            </div>
                                    
            <a id="backtotop" href="#">Back to top</a>
        </div>
        
         <div class="copyright"><small>Copyright &copy; 2018 by João Cruz - Todo direito reservado.</small></div>
    </footer>
    <!-- FOOTER -->
    
</div> <!-- END #page-content -->
<!-- PAGE CONTENT -->

<!-- SCRIPTS -->
<script src="/files/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/files/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/files/js/jquery.visible.min.js"></script>
<script type="text/javascript" src="/files/js/tweenMax.js"></script>
<script type="text/javascript" src="/files/js/jquery.backgroundparallax.min.js"></script>
<script type="text/javascript" src="/files/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="/files/js/jquery.imagesloaded.min.js"></script>
<script type="text/javascript" src="/files/js/script.js"></script>
<!-- SCRIPTS -->
</body>
</html>