<!DOCTYPE html><!--[if IE 9]>
<html class="ie9">
   <![endif]--><!--[if !IE]><!-->
   <html>
      <!--<![endif]-->
      <!-- Mirrored from newsmartwave.net/html/granada/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Aug 2017 07:41:10 GMT -->
      <head>
         <meta charset="utf-8">
         <title>E-Comm</title>
         <base href="/">
         <meta name="description" content="Granada is premium, bootstrap based and responsive ecommerce template">
         <!--[if IE]>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <![endif]-->
         <meta name="viewport" content="width=device-width,initial-scale=1">
         {!! Html::style('storage/frontend/css/bootstrap.min.css') !!}
         
         {!! Html::style('storage/frontend/css/revslider2.css') !!}
        
         {!! Html::style('storage/frontend/css/style.css') !!}
         
         {!! Html::style('storage/frontend/css/responsive.css') !!}
         
        
         
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-route.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-cookies.min.js"></script>

         {!! Html::script('storage/frontend/angular/AuthCtrl.js') !!}
         {!! Html::script('storage/frontend/angular/appRoutes.js') !!}
         
         {!! Html::script('storage/frontend/angular/app.js') !!}
         
         <!--carousel cdn-->
      <!--<script>document.write('<base href="' + document.location + '" />');</script>-->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" />
    <script type="text/javascript" data-require="angular.js@1.3.x" src="https://code.angularjs.org/1.3.15/angular.js" data-semver="1.3.15"></script>
    <script type="text/javascript" data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>-->
         <!--end-->
      </head>
      <body ng-app="ecommApp">
         <div id="wrapper"  ng-controller="AuthController">
            <div id="sticky-header" class="fullwidth-menu header2" data-fixed="fixed"></div>
            <my-navbar></my-navbar>
            <div ng-view></div>
            
            <footer id="footer" class="footer3">
               <div id="footer-inner">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-4 widget">
                           <h4>My Account</h4>
                           <ul class="links">
                              <li><a href="#" title="My account">My account</a></li>
                              <li><a href="#" title="Personal information">Personal information</a></li>
                              <li><a href="#" title="Addresses">Addresses</a></li>
                              <li><a href="#" title="Discount">Discount</a></li>
                              <li><a href="#" title="Orders history">Orders history</a></li>
                              <li><a href="#" title="Your vouchers">Your vouchers</a></li>
                              <li><a href="#" title="Safe shopping">Safe shopping</a></li>
                              <li><a href="#" title="Size guides">Size guides</a></li>
                           </ul>
                        </div>
                        <div class="col-sm-4 widget">
                           <h4>Customer Service</h4>
                           <ul class="links">
                              <li><a href="#" title="Help &amp; Contact">Help &amp; contact</a></li>
                              <li><a href="#" title="Shipping &amp; taxes">Shipping &amp; taxes</a></li>
                              <li><a href="#" title="Return policy">Return policy</a></li>
                              <li><a href="#" title="Careers">Careers</a></li>
                              <li><a href="#" title="Affiliates">Affiliates</a></li>
                              <li><a href="#" title="Legal Notice">Legal Notice</a></li>
                              <li><a href="#" title="Privacy &amp; Security">Privacy &amp; Security</a></li>
                              <li><a href="#" title="Sitemap">Sitemap</a></li>
                           </ul>
                        </div>
                        <div class="col-xs-4 widget">
                           <h4>From Twitter</h4>
                           <ul class="twitter-widget"></ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="footer-bottom">
                  <div class="container">
                     <div class="row">
                        <div class="col-xs-12 clearfix">
                           <p class="copyright-text">&copy; 2014 Powered by WooCommerce&trade;. All Rights Reserved.</p>
                           <ul class="social-links color2 clearfix">
                              <li><a href="#" class="social-icon icon-facebook" title="Facebook"></a></li>
                              <li><a href="#" class="social-icon icon-twitter" title="Twitter"></a></li>
                              <li><a href="#" class="social-icon icon-rss" title="Rss Feed"></a></li>
                              <li><a href="#" class="social-icon icon-delicious" title="Delicious"></a></li>
                              <li><a href="#" class="social-icon icon-linkedin" title="Linkedin"></a></li>
                              <li><a href="#" class="social-icon icon-flickr" title="Flickr"></a></li>
                              <li><a href="#" class="social-icon icon-skype" title="Skype"></a></li>
                              <li><a href="#" class="social-icon icon-email" title="Email"></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
         <a href="#header" id="scroll-top" title="Go to top">Top</a>
         {!! Html::script('storage/frontend/js/jquery.min.js') !!}
         <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
         {!! Html::script('storage/frontend/js/bootstrap.min.js') !!}
         {!! Html::script('storage/frontend/js/smoothscroll.js') !!}
         {!! Html::script('storage/frontend/js/waypoints.js') !!}
         {!! Html::script('storage/frontend/js/waypoints-sticky.js') !!}
         {!! Html::script('storage/frontend/js/jquery.debouncedresize.js') !!}
         {!! Html::script('storage/frontend/js/retina.min.js') !!}
         {!! Html::script('storage/frontend/js/jquery.placeholder.js') !!}
         {!! Html::script('storage/frontend/js/jquery.hoverIntent.min.js') !!}
         {!! Html::script('storage/frontend/js/owl.carousel.min.js') !!}
         {!! Html::script('storage/frontend/js/twitter/jquery.tweet.min.js') !!}
         {!! Html::script('storage/frontend/js/jquery.themepunch.tools.min.js') !!}
         {!! Html::script('storage/frontend/js/jquery.themepunch.revolution.min.js') !!}
         {!! Html::script('storage/frontend/js/jquery.stellar.min.js') !!}
         {!! Html::script('storage/frontend/js/maplabel.js') !!}
         {!! Html::script('storage/frontend/js/main.js') !!}
        
         
         <script type="text/javascript">
          $(function() {
          "use strict";
          jQuery("#revslider").revolution({
              delay: 8e3,
              startwidth: 1170,
              startheight: 600,
              fullWidth: "on",
              fullScreen: "off",
              hideTimerBar: "on",
              spinner: "spinner3"
          })
      });
         </script>
      </body>
      <!-- Mirrored from newsmartwave.net/html/granada/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Aug 2017 07:41:20 GMT -->
   </html>