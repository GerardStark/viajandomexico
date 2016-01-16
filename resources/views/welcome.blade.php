
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/examples.css" type="text/css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/lib/highlight.pack.js"></script>
    <script type="text/javascript" src="js/lib/modernizr.custom.min.js"></script>
    <script type="text/javascript" src="js/examples.js"></script>

    <script type="text/javascript" src="js/lib/greensock/TweenMax.min.js"></script>
    <script type="text/javascript" src="js/ScrollMagic.js"></script>
    <script type="text/javascript" src="js/plugins/animation.gsap.js"></script>
    <script type="text/javascript" src="js/plugins/debug.addIndicators.js"></script>
    <script type="text/javascript" src="js/jssor.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script>
        $(function() {
            $('a[href*=#]:not([href=#])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    </script>
    <script>

        jQuery(document).ready(function ($) {
            var nestedSliders = [];
            $.each(["sliderh1_container", "sliderh2_container", "sliderh3_container", "sliderh4_container"], function (index, value) {
                var sliderhOptions = {
                    $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
                    $AutoPlaySteps: 4,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                    $SlideDuration: 300,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                    $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                    $SlideWidth: 200,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                    //$SlideHeight: 150,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                    $SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
                    $DisplayPieces: 4,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                    $ParkingPosition: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                    $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                    $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                        $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                        $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                        $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                        $SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                        $SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                        $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    }
                };
                var jssor_sliderh = new $JssorSlider$(value, sliderhOptions);

                nestedSliders.push(jssor_sliderh);
            });

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 300,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 80,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                $SlideHeight: 150,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 3,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 2,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 2,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0),

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $SpacingY: 5,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 2                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    var sliderWidth = parentWidth;

                    //keep the slider width no more than 809
                    sliderWidth = Math.min(sliderWidth, 1200);

                    jssor_slider1.$ScaleWidth(sliderWidth);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
            var _CaptionTransitions = [];
            _CaptionTransitions["L"] = { $Duration: 800, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["R"] = { $Duration: 800, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["T"] = { $Duration: 800, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["B"] = { $Duration: 800, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["TL"] = { $Duration: 800, x: 0.6, y: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["TR"] = { $Duration: 800, x: -0.6, y: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["BL"] = { $Duration: 800, x: 0.6, y: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["BR"] = { $Duration: 800, x: -0.6, y: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
            _CaptionTransitions["WAVE|L"] = { $Duration: 1500, x: 0.6, y: 0.3, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Top: 2.5} };
            _CaptionTransitions["MCLIP|B"] = { $Duration: 600, $Clip: 8, $Move: true, $Easing: $JssorEasing$.$EaseOutExpo };
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                }
            };
            var jssor_slider1 = new $JssorSlider$("slider1_container1", options);
        });
    </script>
   </head>
<body>
    <nav class="row">
        <ul class="main-menu">
            <li class="logo"><img src="http://placehold.it/150x150"></li>
            <li class="menu-item"><a href="#inicio">Inicio</a></li>
            <li class="menu-item"><a href="#nosotros">Nosotros</a></li>
            <li class="menu-item"><a href="#testimonios">Testimonios</a></li>
            <li class="menu-item"><a href="#contactanos">Contactanos</a></li>
            <li class="menu-item"><a href="{{url('controlpanel')}}">Login/Registro</a></li>
            <li class="agenda"><img src="{{asset('img/agenda.png')}}" width="150px" height="150px"></li>
        </ul>
    </nav>
    <div id="content-wrapper">
        <div id="example-wrapper">
            <div class="scrollContent">
                <section class="demo" id="section-wipes">
                    <div id="pinContainer">
                        <section class="panel pergaminoa" id="inicio">
                            <div class="container">
                            <div style="position: relative;">
                                <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 809px; height: 152px; overflow: hidden; ">
                                    <!-- Slides Container -->
                                    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 456px;
                        overflow: hidden;">
                                        <div>
                                            <div id="sliderh1_container" style="position: relative; top: 0px; left: 0px; width: 809px;
                                height: 150px;">

                                                <!-- Slides Container -->
                                                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px;
                                    overflow: hidden;">
                                                    <div><img u="image" src="img/ancient-lady/005.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/006.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/011.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/013.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/014.jpg" /></div>
                                                </div>
                                                <!--#region Bullet Navigator Skin Begin -->
                                                <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
                                                <!-- bullet navigator container -->
                                                <div u="navigator" class="jssorb03" style="bottom: 10px; right: 10px;">
                                                    <!-- bullet navigator item prototype -->
                                                    <div u="prototype"><div u="numbertemplate"></div></div>
                                                </div>
                                                <!--#endregion Bullet Navigator Skin End -->
                                            </div>
                                            <div style="position: absolute; top: 0px; left: 0px; width: 809px; height: 30px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                            </div>
                                            <div style="position: absolute; top: 0px; left: 0px; width: 809px; height: 30px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 30px; text-align: center;">
                                                Simple Caption Definition: &lt;div u="caption" t="MCLIP|B" ...&gt;&lt;div/&gt;
                                            </div>
                                        </div>
                                        <div>
                                            <div id="sliderh2_container" style="position: relative; top: 0px; left: 0px; width: 809px;
                                height: 150px;">

                                                <!-- Slides Container -->
                                                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px;
                                    overflow: hidden;">
                                                    <div><img u="image" src="img/ancient-lady/020.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/021.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/022.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/024.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/025.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/027.jpg" /></div>
                                                </div>
                                                <!--#region Bullet Navigator Skin Begin -->
                                                <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
                                                <!-- bullet navigator container -->
                                                <div u="navigator" class="jssorb03" style="bottom: 10px; right: 10px;">
                                                    <!-- bullet navigator item prototype -->
                                                    <div u="prototype"><div u="numbertemplate"></div></div>
                                                </div>
                                                <!--#endregion Bullet Navigator Skin End -->
                                            </div>
                                            <div style="position: absolute; top: 0px; left: 0px; width: 809px; height: 30px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                            </div>
                                            <div style="position: absolute; top: 0px; left: 0px; width: 809px; height: 30px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 30px; text-align: center;">
                                                Simple Caption Definition: &lt;div u="caption" t="MCLIP|B" ...&gt;&lt;div/&gt;
                                            </div>
                                        </div>
                                        <div>
                                            <div id="sliderh3_container" style="position: relative; top: 0px; left: 0px; width: 809px;
                                height: 150px;">

                                                <!-- Slides Container -->
                                                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px;
                                    overflow: hidden;">
                                                    <div><img u="image" src="img/ancient-lady/029.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/030.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/031.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/032.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/034.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/038.jpg" /></div>
                                                </div>
                                                <!--#region Bullet Navigator Skin Begin -->
                                                <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
                                                <!-- bullet navigator container -->
                                                <div u="navigator" class="jssorb03" style="bottom: 10px; right: 10px;">
                                                    <!-- bullet navigator item prototype -->
                                                    <div u="prototype"><div u="numbertemplate"></div></div>
                                                </div>
                                                <!--#endregion Bullet Navigator Skin End -->
                                            </div>
                                            <div style="position: absolute; top: 0px; left: 0px; width: 809px; height: 30px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                            </div>
                                            <div style="position: absolute; top: 0px; left: 0px; width: 809px; height: 30px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 30px; text-align: center;">
                                                Simple Caption Definition: &lt;div u="caption" t="MCLIP|B" ...&gt;&lt;div/&gt;
                                            </div>
                                        </div>
                                        <div>
                                            <div id="sliderh4_container" style="position: relative; top: 0px; left: 0px; width: 809px;
                                height: 150px;">

                                                <!-- Slides Container -->
                                                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px;
                                    overflow: hidden;">
                                                    <div><img u="image" src="img/ancient-lady/039.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/043.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/044.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/047.jpg" /></div>
                                                    <div><img u="image" src="img/ancient-lady/050.jpg" /></div>
                                                </div>
                                                <!--#region Bullet Navigator Skin Begin -->
                                                <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
                                                <!-- bullet navigator container -->
                                                <div u="navigator" class="jssorb03" style="bottom: 10px; right: 10px;">
                                                    <!-- bullet navigator item prototype -->
                                                    <div u="prototype"><div u="numbertemplate"></div></div>
                                                </div>
                                                <!--#endregion Bullet Navigator Skin End -->
                                            </div>
                                            <div style="position: absolute; top: 0px; left: 0px; width: 809px; height: 30px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                            </div>
                                            <div style="position: absolute; top: 0px; left: 0px; width: 809px; height: 30px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 30px; text-align: center;">
                                                Simple Caption Definition: &lt;div u="caption" t="MCLIP|B" ...&gt;&lt;div/&gt;
                                            </div>
                                        </div>
                                    </div>

                                    <!--#region Bullet Navigator Skin Begin -->
                                    <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
                                    <style>

                                    </style>
                                    <!-- bullet navigator container -->
                                    <div u="navigator" class="jssorb02" style="bottom: 16px; left: 6px;">
                                        <!-- bullet navigator item prototype -->
                                        <div u="prototype"><div u="numbertemplate"></div></div>
                                    </div>
                                    <!--#endregion Bullet Navigator Skin End -->
                                    <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
                                </div>
                                <!-- Jssor Slider End -->

                                <div id="slider1_container1" style="position: relative; width: 600px; height: 300px;">
                                    <!-- Slides Container -->
                                    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:600px; height:300px; overflow: hidden;">
                                        <!-- Slide -->
                                        <div>
                                            <img u="image" src="img/landscape/01.jpg" />
                                            <div u="caption" t="MCLIP|B" style="position: absolute; top: 250px; left: 0px;
                            width: 600px; height: 50px;">
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                                </div>
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 50px; text-align: center;">
                                                    Simple Caption Definition: &lt;div u="caption" t="MCLIP|B" ...&gt;&lt;div/&gt;
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slide -->
                                        <div>
                                            <img u="image" src="img/landscape/02.jpg" />
                                            <div u="caption" t="MCLIP|B" t2="T" style="position: absolute; top: 250px; left: 0px;
                            width: 600px; height: 50px;">
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                                </div>
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 50px; text-align: center;">
                                                    Define both 't' and 't2': &lt;div u="caption" t="MCLIP|B" t2="T" ...&gt;&lt;div/&gt;
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slide -->
                                        <div>
                                            <img u="image" src="../img/landscape/03.jpg" />
                                            <div u="caption" t="NO" t2="MCLIP|B" style="position: absolute; top: 250px; left: 0px;
                            width: 600px; height: 50px;">
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                                </div>
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 50px; text-align: center;">
                                                    Disable 'Play In': &lt;div u="caption" t="NO" t2="MCLIP|B" ...&gt;&lt;div/&gt;
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slide -->
                                        <div>
                                            <img u="image" src="/img/landscape/04.jpg" />
                                            <div u="caption" t="MCLIP|B" t2="NO" style="position: absolute; top: 250px; left: 0px;
                            width: 600px; height: 50px;">
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                                </div>
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 50px; text-align: center;">
                                                    Disable 'Play Out': &lt;div u="caption" t="MCLIP|B" t2="NO" ...&gt;&lt;div/&gt;
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slide -->
                                        <div>
                                            <img u="image" src="img/landscape/05.jpg" />
                                            <div u="caption" t="MCLIP|B" t2="NO" style="position: absolute; top: 250px; left: 0px;
                            width: 600px; height: 50px;">
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                background-color: Black; opacity: 0.5; filter: alpha(opacity=50);">
                                                </div>
                                                <div style="position: absolute; top: 0px; left: 0px; width: 600px; height: 50px;
                                color: White; font-size: 16px; font-weight: bold; line-height: 50px; text-align: center;">
                                                    Disable 'Play Out': &lt;div u="caption" t="MCLIP|B" t2="NO" ...&gt;&lt;div/&gt;
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </section>
                        <section class="panel pergaminob" id="nosotros">
                            <div class="container">
                                <div class="col-md-4">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, autem corporis dolore doloribus earum enim minima nulla pariatur praesentium quas quibusdam repellendus sit voluptas. Dolorem eos necessitatibus quod rerum vero!
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur consequuntur enim error hic iste quae quidem quis recusandae rem sunt, ullam, voluptatibus! Ad eveniet nisi perferendis, quibusdam recusandae rem vel?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis cum dolore facilis fuga illo molestiae natus nostrum officiis placeat praesentium, quam quas qui quod repudiandae sequi veniam vero? Quibusdam.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad beatae cum dolore, eligendi est explicabo fugit incidunt nemo obcaecati, placeat possimus saepe unde vitae voluptates! Iste maxime reiciendis vel.
                                </div>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/aIeInt84RmA" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </section>
                        <section class="panel pergaminoc" id="testimonios">
                            <div class="container">
                                <img src="{{asset('img/testimonios.png')}}" height="auto" width="100%">
                            </div>
                        </section>
                        <section class="panel pergaminod" id="contactanos">
                                <form action="">
                                    <div class="container">
                                        <h1 class="padcon">Contactanos</h1>
                                        <form action="sendcontact.php" method="post">
                                            <label class="col-md-6 col-sm-6 formulario">
                                                *Nombre:
                                                <input type="text" class="form-control" name="nombre" autocomplete="off" <?php echo isset($campos['nombre']) ? 'value="'.es($campos['nombre']).'"' : '' ?>>
                                            </label>
                                            <label class="col-md-6 col-sm-6 formulario">
                                                *Email
                                                <input class="form-control" type="text" name="email" <?php echo isset($campos['email']) ? 'value="'.es($campos['email']).'"' : '' ?>>
                                            </label>
                                            <label class="col-md-12 col-sm-12 formulario">
                                                * Mensaje
                                                <textarea name="mensaje" class="form-control" id="mensaje" rows="10" ><?php echo isset($campos['mensaje']) ? es($campos['mensaje']) : '' ?></textarea>
                                            </label>
                                            <div class="padcon">
                                                <input type="submit" class="btn btn-default" value="Enviar">
                                                <p class="muted">*Campo Obligatorio</p>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                        </section>
                    </div>
                    <script>
                        $(function () { // wait for document ready
                            // init
                            var controller = new ScrollMagic.Controller();

                            // define movement of panels
                            var wipeAnimation = new TimelineMax()
                                    .fromTo("section.panel.pergaminob", 1, {x: "100%"}, {x: "0%", ease: Linear.easeNone})  // in from left
                                    .fromTo("section.panel.pergaminoc", 1, {y:  "100%"}, {y: "0%", ease: Linear.easeNone})  // in from right
                                    .fromTo("section.panel.pergaminod", 1, {x: "-100%"}, {x: "0%", ease: Linear.easeNone}) // in from top


                            // create scene to pin and link animation
                            new ScrollMagic.Scene({
                                triggerElement: "#pinContainer",
                                triggerHook: "onLeave",
                                duration: "300%"
                            })
                                    .setPin("#pinContainer")
                                    .setTween(wipeAnimation)
                                    .addIndicators() // add indicators (requires plugin)
                                    .addTo(controller);
                        });
                    </script>
                </section>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/tracking.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
