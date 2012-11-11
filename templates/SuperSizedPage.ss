<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<!--
		Supersized - Fullscreen Slideshow jQuery Plugin
		Version : 3.2.7
		Site	: www.buildinternet.com/project/supersized
		
		Author	: Sam Dunn
		Company : One Mighty Roar (www.onemightyroar.com)
		License : MIT License / GPL License
                Silverstripe module version by : Luis E. S. Dias ( www.smartbyte.com.br )
	-->

	<head>
                <% base_tag %>
		<title>$Title</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="{$BaseHref}supersized/css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="{$BaseHref}supersized/css/supersized.shutter.css" type="text/css" media="screen" />
                <link rel="stylesheet" href="{$BaseHref}supersized/css/thumbnail_slider.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="{$BaseHref}supersized/javascript/jquery.easing.min.js"></script>
		<script type="text/javascript" src="{$BaseHref}supersized/javascript/supersized.3.2.7.js"></script>
		<script type="text/javascript" src="{$BaseHref}supersized/javascript/supersized.shutter.js"></script>
                <script type="text/javascript" src="{$BaseHref}supersized/javascript/thumbnailSlider.js"></script>
		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
                                    // Functionality
                                    autoplay : $AutoPlay,
                                    fit_always : $FitAlways,
                                    fit_landscape : $FitLandscape,
                                    fit_portrait : $FitPortrait,
                                    horizontal_center : $HorizontalCenter,
                                    image_protect : $ImageProtect,
                                    keyboard_nav : $KeyboardNav,
                                    min_height : $MinHeight,
                                    min_width : $MinWidth,
                                    new_window : $NewWindow,
                                    pause_hover : $PauseHover,
                                    performance : $Performance,
                                    random : $Random,
                                    slideshow : $Slideshow,
                                    slide_interval : $SlideInterval,
                                    <% if SlideLinks = 0 %>
                                        slide_links : 0,
                                    <% else %>
                                        slide_links : '$SlideLinks',
                                    <% end_if %>
                                    start_slide : $StartSlide,
                                    stop_loop : $StopLoop,
                                    thumb_links : $ThumbLinks,
                                    thumbnail_navigation : $ThumbnailNavigation,
                                    transition : $Transition,
                                    transition_speed : $TransitionSpeed,
                                    vertical_center : $VerticalCenter,
                                    slides : [			// Slideshow Images
                                    <% if getImages %> 
                                        <% control getImages %>
                                            <% if Last %>
                                                {image : '$URL', title : '$title', thumb : '$URL'}
                                            <% else %>
                                                {image : '$URL', title : '$title', thumb : '$URL'},
                                            <% end_if %>                                            
                                        <% end_control %>                                           
                                    <% end_if %>
                                    ]
                            });
                            
                            // Redefines theme image path by Silverstripe
                            vars.image_path = '{$BaseHref}supersized/images/';
		    });
		</script>
                <% if SlideLinks = "codrops" %>
                    <script type="text/javascript">
                            $(function() {
                                $('#thumbnailSlider').thumbnailSlider({
                                    speed	: $CodropsSpeed,
                                    easing	: '$CodropsEasing',
                                    thumb_width	: $CodropsThumbWidth,
                                    thumb_height: $CodropsThumbHeight,
                                    zoom        : $CodropsZoom,
                                    zoomratio	: $CodropsZoomRatio,
                                    zoomspeed	: $CodropsZoomSpeed
                                });
                            });
                    </script>
                <% end_if %>		
	</head>
	
	<style type="text/css">
            ul#demo-block{ margin:0 15px 15px 15px; }
            ul#demo-block li{ margin:0 0 10px 0; padding:10px; display:inline; float:left; clear:both; color:#aaa; background:url('{$BaseHref}supersized/images/bg-black.png'); font:11px Helvetica, Arial, sans-serif; }
            ul#demo-block li a{ color:#eee; font-weight:bold; }
	</style>

<body>

	<!--Thumbnail Navigation-->
	<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
	<div id="thumb-tray" class="load-item">
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>
	
	<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><img id="pauseplay" src="{$BaseHref}supersized/images/pause.png"/></a>
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			
                        <% if ThumbLinks = 1 %>
                            <!--Thumb Tray button-->
                            <a id="tray-button"><img id="tray-arrow" src="{$BaseHref}supersized/images/button-tray-up.png"/></a>
			<% end_if %>
			<!--Navigation-->
                        <% if SlideLinks != "codrops" %>
                            <ul id="slide-list"></ul>
                        <% end_if %>
		</div>
	</div>
        <% if SlideLinks = "codrops" %>
            <div id="thumbnailSlider">
                <ul class="ts_container" style="width:{$calcThumbNailWidth}px;">
                    <% if getImages %> 
                        <% control getImages %>
                            <li class="slide-link-0"><a>$title</a></li>                                            
                        <% end_control %>
                    <% end_if %>
                    <li class="ts_thumbnails"> <!-- animate to slide frame -->
                        <div class="ts_preview_wrapper">
                            <ul class="ts_preview"><!-- animate left to slide to the right thumb -->
                            <% if getImages %> 
                                <% control getImages %>
                                    <li><img src="$URL" alt="$title" width="{$Top.CodropsThumbWidth}" height="{$Top.CodropsThumbHeight}" /></li>
                                <% end_control %>
                            <% end_if %>
                            </ul>
                        </div>
                        <span></span>
                    </li>
                </ul>
            </div>
        <% end_if %>
</body>
</html>