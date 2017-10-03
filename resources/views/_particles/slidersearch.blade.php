




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>





<link rel="stylesheet" type="text/css" href="revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
<link rel="stylesheet" type="text/css" href="revolution/fonts/font-awesome/css/font-awesome.css">

<!-- REVOLUTION STYLE SHEETS -->
<link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
<!-- REVOLUTION LAYERS STYLES -->


<link rel="stylesheet" type="text/css" href="revolution/css/layers.css">

<!-- REVOLUTION NAVIGATION STYLES -->
<link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">

<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>


<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>



<div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
<!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
	<div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
<ul>
  <!-- SLIDE  -->
    @foreach(\App\Slider::orderBy('name')->get() as $slide)
	<li data-index="{{$slide->text}}" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="{{ URL::asset('upload/slides/'.$slide->image_name.'.jpg')}}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
		<!-- MAIN IMAGE -->
		<img src={{ URL::asset('upload/slides/'.$slide->image_name.'.jpg')}}  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption NotGeneric-Title   tp-resizeme"
			 id="slide-3045-layer-1"
			 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
			 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
			data-fontsize="['70','70','70','45']"
			data-lineheight="['70','70','70','50']"
			data-width="none"
			data-height="none"
			data-whitespace="nowrap"
			data-visibility="['on', 'on', 'on', 'on']"

			data-type="text"
			data-responsive_offset="off"

			data-frames='[{"from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
			data-textAlign="['center','center','center','center']"
			data-paddingtop="[10,10,10,10]"
			data-paddingright="[0,0,0,0]"
			data-paddingbottom="[10,10,10,10]"
			data-paddingleft="[0,0,0,0]"

			style="z-index: 5; white-space: nowrap;text-transform:left;" >    {!!$slide->text!!}</div>

	</li>
        @endforeach
	<!-- SLIDE  -->

</ul>
<div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>	</div>
</div><!-- END REVOLUTION SLIDER -->


<script type="text/javascript">
        var tpj=jQuery;

  var revapi1078;
  tpj(document).ready(function() {
    if(tpj("#rev_slider_1078_1").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_1078_1");
    }else{
			setTimeout(
				function() {
						$( ".tp-rightarrow" ).trigger('click');
						console.log("Si")
				},
				200
			)
      revapi1078 = tpj("#rev_slider_1078_1").show().revolution({
        sliderType:"standard",
				jsFileLocation:"revolution/js/",
        sliderLayout:"fullwidth",
        dottedOverlay:"none",
        delay:9000,
        navigation: {
          keyboardNavigation:"off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation:"off",
          mouseScrollReverse:"default",
          onHoverStop:"off",
          touch:{
            touchenabled:"on",
            swipe_threshold: 75,
            swipe_min_touches: 1,
            swipe_direction: "horizontal",
            drag_block_vertical: false
          }
          ,
          arrows: {
            style:"zeus",
            enable:true,
            hide_onmobile:true,
            hide_under:600,
            hide_onleave:true,
            hide_delay:200,
            hide_delay_mobile:1200,
            tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
            left: {
              h_align:"left",
              v_align:"center",
              h_offset:30,
              v_offset:0
            },
            right: {
              h_align:"right",
              v_align:"center",
              h_offset:30,
              v_offset:0
            }
          }
          ,
          bullets: {
            enable:true,
            hide_onmobile:true,
            hide_under:600,
            style:"metis",
            hide_onleave:true,
            hide_delay:200,
            hide_delay_mobile:1200,
            direction:"horizontal",
            h_align:"center",
            v_align:"bottom",
            h_offset:0,
            v_offset:30,
            space:5,
            tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title"></span>'
          }
        },
        viewPort: {
          enable:true,
          outof:"pause",
          visible_area:"80%",
          presize:false
        },
        responsiveLevels: [1240, 1024, 778, 480, 300],
        visibilityLevels:[1240,1024,778,480, 300],
        gridwidth:[1240,1024,778,480],
        gridheight:[600,600,500,400],
        lazyType:"none",
        shadow:0,
        spinner:"off",
        stopLoop:"off",
        stopAfterLoops:-1,
        stopAtSlide:-1,
        shuffle:"off",
        autoHeight:"off",
        hideThumbsOnMobile:"off",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        debugMode:false,
        fallbacks: {
          simplifyAll:"off",
          nextSlideOnWindowFocus:"off",
          disableFocusListener:false,
        }
      });
    }
  });	/*ready*/
</script>
