<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Viajando México</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jssor.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>



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
                    sliderWidth = Math.min(sliderWidth, 809);

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


        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })


    </script>
</head>
<body>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
            AGENDA PHP xD!!!
            </div>
            <div class="modal-footer">
                Damn!
                <br>
                <br>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

    <header>
        <video autoplay muted id="bgvid" loop>
            <source src="img/La_Catrina_Holbox.webm" type="video/webm">
        </video>
        <nav>



            <div class="container">
                <img src="http://placehold.it/100x100" alt="Viajando Mexico" class="logo">
                <ul class="main-nav">
                    <li><a href="#seccion-destacados">Inicio</a></li>
                    <li><a href="#seccion-nosotros">Nosotros</a></li>
                    <li><a href="#seccion-dos">Testimonios</a></li>
                    <li><a href="#seccion-contacto">Contacto</a></li>
                    <li><a href="{{url('controlpanel')}}">Login/Registro</a></li>
                    <li><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Launch demo modal
                        </button>
                    </li>
                </ul>
                {{--<a href="#"><img src="{{asset('img/agenda.png')}}" alt="Agenda" class="agenda"></a>--}}
            </div>
            <div class="hero-text-box">
                <h1>Viajando Mexico. <br> Atrevete a Descubrir.</h1>
                <a class="btn btn-full" href="#">Registrate</a>
                <a class="btn btn-ghost" href="#">Conoce.</a>
            </div>
        </nav>
    </header>
    <section id="seccion-destacados" class="seccion-destacados">
        <div class="container">
            <h2>Destinos destacados.</h2>
            <div class="col-md-8">
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
                            <img u="image" src="img/landscape/03.jpg" />
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
                            <img u="image" src="img/landscape/04.jpg" />
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
            <div class="col-md-4 col-md-push-1 texto-right">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias minima minus neque quam voluptatibus? Accusantium aliquid error incidunt ipsum, iste quos ratione veniam. Debitis necessitatibus odio officia placeat reiciendis ullam.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam aut dolor ea eligendi et ex fugiat in neque nihil numquam officia perferendis praesentium provident quae, quidem quod veniam voluptates!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam architecto beatae, dicta ea eaque enim fugiat impedit iste laudantium minima nesciunt nihil officia praesentium repellat repudiandae, tenetur vitae voluptatum?
            </div>
        </div>
    </section>
    <section class="seccion-nosotros" id="seccion-nosotros">
        <div class="container">
            <h2>Nosotros.</h2>
            <div class="col-md-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium architecto asperiores deleniti necessitatibus quas ratione sequi tempora, tempore. A architecto culpa eaque natus nihil non, officiis voluptas? Id, sit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium architecto asperiores deleniti necessitatibus quas ratione sequi tempora, tempore. A architecto culpa eaque natus nihil non, officiis voluptas? Id, sit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium architecto asperiores deleniti necessitatibus quas ratione sequi tempora, tempore. A architecto culpa eaque natus nihil non, officiis voluptas? Id, sit.
            </div>
            <div class="col-md-9  col-md-push-1">
                <video autoplay muted loop width="100%">
                    <source src="img/La_Catrina_Holbox.webm" type="video/webm">
                </video>
            </div>
        </div>
    </section>
    <section id="seccion-dos" class="seccion-dos">
        <div class="container">
            <h2>Testimonios de Nuestros Clientes.</h2>
        <div class="cd-testimonials-wrapper cd-container">
            <ul class="cd-testimonials">
                <li>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="cd-author">
                        <img src="img/avatar-1.jpg" alt="Author image">
                        <ul class="cd-author-info">
                            <li>MyName</li>
                            <li>CEO, AmberCreative</li>
                        </ul>
                    </div>
                </li>

                <li>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ea, perferendis error repudiandae numquam dolor fuga temporibus. Unde omnis, consequuntur.</p>
                    <div class="cd-author">
                        <img src="img/avatar-2.jpg" alt="Author image">
                        <ul class="cd-author-info">
                            <li>MyName</li>
                            <li>Designer, CodyHouse</li>
                        </ul>
                    </div>
                </li>

                <li>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam totam nulla est, illo molestiae maxime officiis, quae ad, ipsum vitae deserunt molestias eius alias.</p>
                    <div class="cd-author">
                        <img src="img/avatar-3.jpg" alt="Author image">
                        <ul class="cd-author-info">
                            <li>MyName</li>
                            <li>CEO, CompanyName</li>
                        </ul>
                    </div>
                </li>

            </ul> <!-- cd-testimonials -->

            <a href="#0" class="cd-see-all">Todos los Testimonios</a>
        </div> <!-- cd-testimonials-wrapper -->

        <div class="cd-testimonials-all">
            <div class="cd-testimonials-all-wrapper">
                <ul>
                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit totam saepe iste maiores neque animi molestias nihil illum nisi temporibus.</p>

                        <div class="cd-author">
                            <img src="img/avatar-1.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nostrum nisi, doloremque error hic nam nemo doloribus porro impedit perferendis. Tempora, distinctio hic suscipit. At ullam eaque atque recusandae modi fugiat voluptatem laborum laboriosam rerum, consequatur reprehenderit omnis, enim pariatur nam, quidem, quas vel reiciendis aspernatur consequuntur. Commodi quasi enim, nisi alias fugit architecto, doloremque, eligendi quam autem exercitationem consectetur.</p>

                        <div class="cd-author">
                            <img src="img/avatar-2.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem quibusdam eveniet, molestiae laborum voluptatibus minima hic quasi accusamus ut facere, eius expedita, voluptatem? Repellat incidunt veniam quaerat, qui laboriosam dicta. Quidem ducimus laudantium dolorum enim qui at ipsum, a error.</p>

                        <div class="cd-author">
                            <img src="img/avatar-3.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero voluptates officiis tempore quae officia! Beatae quia deleniti cum corporis eos perferendis libero reiciendis nemo iusto accusamus, debitis tempora voluptas praesentium repudiandae laboriosam excepturi laborum, nisi optio repellat explicabo, incidunt ex numquam. Ullam perferendis officiis harum doloribus quae corrupti minima quia, aliquam nostrum expedita pariatur maxime repellat, voluptas sunt unde, inventore.</p>

                        <div class="cd-author">
                            <img src="img/avatar-4.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit totam saepe iste maiores neque animi molestias nihil illum nisi temporibus.</p>

                        <div class="cd-author">
                            <img src="img/avatar-5.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quia quas, quis illo adipisci voluptate ex harum iste commodi nulla dolor. Eius ratione quod ab!</p>

                        <div class="cd-author">
                            <img src="img/avatar-6.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, dignissimos iure rem fugiat consequuntur officiis.</p>

                        <div class="cd-author">
                            <img src="img/avatar-1.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At temporibus tempora necessitatibus reiciendis provident deserunt maxime sit id. Dicta aut voluptatibus placeat quibusdam vel, dolore.</p>

                        <div class="cd-author">
                            <img src="img/avatar-2.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis iusto sapiente, excepturi velit, beatae possimus est tenetur cumque fugit tempore dolore fugiat! Recusandae, vel suscipit? Perspiciatis non similique sint suscipit officia illo, accusamus dolorum, voluptate vitae quia ea amet optio magni voluptatem nemo, natus nihil.</p>

                        <div class="cd-author">
                            <img src="img/avatar-3.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor quasi officiis pariatur, fugit minus omnis animi ut assumenda quod commodi, ad a alias maxime unde suscipit magnam, voluptas laboriosam ipsam quibusdam quidem, dolorem deleniti id.</p>

                        <div class="cd-author">
                            <img src="img/avatar-4.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At temporibus tempora necessitatibus reiciendis provident deserunt maxime sit id. Dicta aut voluptatibus placeat quibusdam vel, dolore.</p>

                        <div class="cd-author">
                            <img src="img/avatar-5.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>

                    <li class="cd-testimonials-item">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque tempore ipsam, eos suscipit nostrum molestias reprehenderit, rerum amet cum similique a, ipsum soluta delectus explicabo nihil repellat incidunt! Minima magni possimus mollitia deserunt facere, tempore earum modi, ea ipsa dicta temporibus suscipit quidem ut quibusdam vero voluptatibus nostrum excepturi explicabo nulla harum, molestiae alias. Ab, quidem rem fugit delectus quod.</p>

                        <div class="cd-author">
                            <img src="img/avatar-6.jpg" alt="Author image">
                            <ul class="cd-author-info">
                                <li>MyName</li>
                                <li>CEO, CompanyName</li>
                            </ul>
                        </div> <!-- cd-author -->
                    </li>
                </ul>
            </div>	<!-- cd-testimonials-all-wrapper -->

            <a href="#0" class="close-btn">Close</a>
        </div> <!-- cd-testimonials-all -->
            </div>
    </section>
    <section id="seccion-contacto" class="seccion-contacto">
        <form method="post" id="contacto">
            <div class="container">
                <h2>Contactanos.</h2>
                <div class="col-md-4">
                    <div class="form-group col-md-6">
                        <label for="Nombre" >Nombre:</label>
                            <input type="text" class="form-control"name="nombre" placeholder="Tu Nombre" value="{{old('nombre')}}">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="Correo" >Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Tu Correo Electronico" value="{{old('email')}}">

                    </div>
                    <div class="form-group col-md-12">
                        <label for="Mensaje">Mensaje</label>
                            <textarea name="contenido" id="contenido" cols="30" rows="10" class="form-control">{{old('contenido')}}</textarea>

                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <iframe src="https://www.google.com/maps/d/embed?mid=zec0EUbnaDWE.knlyMHIUGNxo&hl=en_US" width="100%" height="350px"></iframe>
                </div>
                <div class="col-md-4">
                    <p class="text-justify ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid consectetur dicta doloribus earum eius error eveniet, facere fuga fugiat inventore nihil nobis officiis quaerat quas rem similique sint, veniam.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad dignissimos doloremque ipsam magnam quas quisquam reiciendis tempora. Aut, magnam, modi? Commodi ducimus exercitationem modi mollitia neque nesciunt officiis sint vitae.</p>
                </div>
            </div>
        </form>
    </section>
    <section class="seccion-footer">
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur blanditiis corporis cumque doloribus ea eveniet excepturi fuga hic incidunt minima numquam officiis quas, quis ratione reiciendis sit unde!</div>
                <div class="col-md-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto consectetur debitis delectus dignissimos ea ex exercitationem facilis fuga, illo laboriosam molestiae obcaecati quam quisquam reiciendis rerum sed tempore voluptatibus.</div>
                <div class="col-md-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur cumque dolorum ducimus id iste laboriosam, provident? Adipisci distinctio dolor earum eos fugit molestiae nisi porro repellendus totam? Delectus dolores, maiores.</div>
            </div>
            <div class="col-md-12">
                <div class="col-md-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam aspernatur blanditiis corporis cumque doloribus ea eveniet excepturi fuga hic incidunt minima numquam officiis quas, quis ratione reiciendis sit unde!</div>
                <div class="col-md-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto consectetur debitis delectus dignissimos ea ex exercitationem facilis fuga, illo laboriosam molestiae obcaecati quam quisquam reiciendis rerum sed tempore voluptatibus.</div>
                <div class="col-md-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur cumque dolorum ducimus id iste laboriosam, provident? Adipisci distinctio dolor earum eos fugit molestiae nisi porro repellendus totam? Delectus dolores, maiores.</div>
            </div>
        </div>
    </section>

    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script>
        jQuery(document).ready(function($){
            //create the slider
            $('.cd-testimonials-wrapper').flexslider({
                selector: ".cd-testimonials > li",
                animation: "slide",
                controlNav: false,
                slideshow: false,
                smoothHeight: true,
                start: function(){
                    $('.cd-testimonials').children('li').css({
                        'opacity': 1,
                        'position': 'relative'
                    });
                }
            });

            //open the testimonials modal page
            $('.cd-see-all').on('click', function(){
                $('.cd-testimonials-all').addClass('is-visible');
            });

            //close the testimonials modal page
            $('.cd-testimonials-all .close-btn').on('click', function(){
                $('.cd-testimonials-all').removeClass('is-visible');
            });
            $(document).keyup(function(event){
                //check if user has pressed 'Esc'
                if(event.which=='27'){
                    $('.cd-testimonials-all').removeClass('is-visible');
                }
            });

            //build the grid for the testimonials modal page
            $('.cd-testimonials-all-wrapper').children('ul').masonry({
                itemSelector: '.cd-testimonials-item'
            });
        });
    </script>

</body>
</html>