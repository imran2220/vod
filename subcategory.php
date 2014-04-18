<?php
include_once("include/functions.php");
if (isLogin() == false) {
    header("Location: login.php?ref=" . curPageURL());
}
// Parameters
$pCat = isset($_GET['cat']) ? $_GET['cat'] : "";
$pSubCat = isset($_GET['subcat']) ? $_GET['subcat'] : "";
$pCat = str_replace("-", " ", $pCat);
$pSubCat = str_replace("-", " ", $pSubCat);
// Login Div
$UserDiv = "<div class=\"loginbar\"><div class='innerDiv'> <a href=\"signup.php\">مستخدم جديد</a> <a href=\"login.php\">تسجيل الدخول</a> </div></div>";
include_once("include/usersession.php");
// Fetching Results for Parameters		
$cTitle = "";
$sTitle = "";
$Result = GetSubCategoryHTML($pCat, $pSubCat);
if ($Result == "")
    $html = "<div style=\" width: 940px;overflow: hidden; height: 340px; margin-bottom:10;text-align:right;margin-top:10px;font-size:19px;\">المحتوى المطلوب غير متوفر حالياً</div>";
else
    $html = "<div style=\" width: 940px;overflow: hidden; height: auto; margin-bottom:10; \">" . $Result . "</div>";
?>
<?php $pSubCat=$_REQUEST['subcat']; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>3at3oot.TV</title>
<meta name="description" content="Online TV ">
<meta name="author" content="pixel-industry">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">
<?php include_once("include/head.php"); ?>
</head>

<body>

<!-- #header-wrapper start -->
<?php include_once("include/header.php"); ?>
<!-- 3header-wrapper end --> 
<!-- .top-shadow -->
<div class="top-shadow"></div>
<!-- Breadcrum -->
<section class="page-title-container"> 
  
  <!-- .container_12 start -->
  <div class="container_12"> 
    
    <!-- .page-title start -->
    <div class="page-title grid_12">
      <div class="title">
        <h1><?php echo $pSubCat; ?></h1>
      </div>
      <ul class="breadcrumbs">
        <li><?php echo "<a class=\"home\" href=\"$SITE_NAME\"> ‫الصفحة الرئيسية</a>"; ?></li>
        <li>/</li>
        <li><?php echo "<a href=\"programs.php\"> ‫برامجنا</a>"; ?></li>
        <li>/</li>
        <li><a href='category.php?cat=<?php echo str_replace(" ", "-", $pCat) ;?>' ><?php echo $pCat; ?></a></li>
        <li>/</li>
        <li><span class="active"><?php echo $pSubCat; ?></span></li>
      </ul>
    </div>
    <!-- .page-title end --> 
    
  </div>
  <!-- .container_12 end --> 
</section>
<!-- .rs-wrapper start -->
<div class="rs-wrapper">
  <div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
      <?php if($pSubCat=='Syrian-Movies'){ ?>
      <ul>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/AL7dod/S.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/Altir7al/S.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/images/S.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
      </ul>
      <?php } elseif($pSubCat=='Walid'){ ?>
      <ul>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-1.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-2.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-3.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
      </ul>
      <?php }elseif($pSubCat=='Bride-of-AbuDhabi'){ ?>
      <ul>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="pimages/banner2.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="images/A7qad_Slide-Banner.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="images/Sa7abet_Slide-Banner.jpgd"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
      </ul>
      <?php }elseif($pSubCat=='Films'){ ?>
      <ul>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SCartoons/S_1.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SCartoons/S-2.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SCartoons/S-3.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
      </ul>
      <?php }elseif($pSubCat=='TV-Series'){ ?>
      <ul>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-1.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-2.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-3.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
      </ul>
      <?php } else { ?>
      <ul>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-1.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-2.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
        <li data-transition="slotzoom-horizontal" data-slotamount="15"> <img src="photos/SFashion/S-3.jpg" alt="background"> 
          <!--<div class="caption lfl regular_title"  data-x="100" data-y="230" data-speed="700" data-start="2000" data-easing="easeOutBack">Drama Name</div>
          <div class="caption lfr regular_subtitle"  data-x="100" data-y="300" data-speed="700" data-start="2400" data-easing="easeOutBack"><a href="#">Watch Now</a></div>--> 
        </li>
      </ul>
      <?php }?>
    </div>
  </div>
</div>
<!-- .rs-wrapper end -->

<section id="content-wrapper"> 
  
  <!-- .container_12 start -->
  <div class="container_12"> 
    
    <!-- .grid_12 start --> 
    <!-- .grid_12 end -->
    
    <article class="grid_12 client-carousel"> 
      <!-- .section-title .center start -->
      <section class="section-title center">
        <div class="title-container carousel">
          <div class="carousel-nav-container">
            <ul class="carousel-nav">
              <li> <a class="prev" href="#"></a> </li>
            </ul>
          </div>
          <section class="title">
            <h2><?php echo "<a href='category.php?cat=" . str_replace(" ", "-", $pCat) . "' >$cTitle</a>    $sTitle"; ?> </h2>
            <span>Browse Sub Categories</span> </section>
          <div class="carousel-nav-container">
            <ul class="carousel-nav">
              <li> <a class="next" href="#"></a> </li>
            </ul>
          </div>
        </div>
      </section>
      <!-- .section-title .center end -->
      
      <ul id="client-carousel" class="carousel-li">
      <?php echo $html; ?>
        
      </ul>
      <!-- .client-carousel end --> 
    </article>
  </div>
  <!-- .container_12 end --> 
</section>

<!-- #footer-wrapper start -->
<?php include_once("include/footer.php"); ?>
<!-- #footer-wrapper end --> 

<!-- scripts --> 
<script  src="js/jquery-1.8.3.js"></script> <!-- jQuery library --> 
<script  src="js/jquery.placeholder.min.js"></script><!-- jQuery placeholder fix for old browsers --> 
<script  src="js/jquery.carouFredSel-6.0.0-packed.js"></script><!-- CarouFredSel carousel plugin --> 
<script  src="js/jquery.touchSwipe-1.2.5.js"></script><!-- support for touch swipe on mobile devices --> 
<script  src="js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto lightbox --> 
<script  src="js/portfolio.js"></script> <!-- portfolio custom options --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script  src="js/include.js"></script> <!-- jQuery custom options --> 

<script>
            /* <![CDATA[ */
            // NEWSLETTER FORM AJAX SUBMIT
            $('.newsletter .submit').on('click', function(event){
                event.preventDefault();
                var email = $('.email').val();
                var form_data = new Array({ 'Email' : email});
                $.ajax({
                    type: 'POST',
                    url: "contact.php",
                    data: ({'action': 'newsletter', 'form_data' : form_data})
                }).done(function(data) {
                    alert(data);
                });
            });
            
            // REVOLUTION SLIDER 
            jQuery(document).ready(function() {

                if (jQuery.fn.cssOriginal !== undefined)   // CHECK IF fn.css already extended
                    jQuery.fn.css = jQuery.fn.cssOriginal;

                jQuery('.fullwidthbanner').revolution(
                        {
                            delay: 50000,
                            startheight: 413,
                            startwidth: 940,
                            hideThumbs: 200,
                            thumbWidth: 100,
                            thumbHeight: 50,
                            thumbAmount: 5,
                            navigationType: "none",
                            navigationArrows: "verticalcentered",
                            navigationStyle: "round",
                            navigationHAlign: "right",
                            navigationVAlign: "top",
                            navigationHOffset: 0,
                            navigationVOffset: 20,
                            soloArrowLeftHalign: "left",
                            soloArrowLeftValign: "center",
                            soloArrowLeftHOffset: 20,
                            soloArrowLeftVOffset: 0,
                            soloArrowRightHalign: "right",
                            soloArrowRightValign: "center",
                            soloArrowRightHOffset: 20,
                            soloArrowRightVOffset: 0,
                            touchenabled: "on",
                            onHoverStop: "on",
                            navOffsetHorizontal: 0,
                            navOffsetVertical: 20,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            hideSliderAtLimit: 0,
                            stopAtSlide: -1,
                            stopAfterLoops: -1,
                            shadow: 0,
                            fullWidth: "on"

                        });
            });

            // PORTFOLIO CAROUSEL
            $("#foo2").carouFredSel({
                auto: false,
                scroll: 1,
                pagination: "#foo2_pag",
                swipe: {
                    ontouch: true,
                    onMouse: true
                },
                width: 'variable',
                height: 'variable',
                items: {
                    width: 'auto',
                    visible: 4
                }
            });
			
			// PORTFOLIO CAROUSEL
            $("#foo3").carouFredSel({
                auto: false,
                scroll: 1,
                pagination: "#foo3_pag",
                swipe: {
                    ontouch: true,
                    onMouse: true
                },
                width: 'variable',
                height: 'variable',
                items: {
                    width: 'auto',
                    visible: 4
                }
            });


// PORTFOLIO CAROUSEL
            $("#foo4").carouFredSel({
                auto: false,
                scroll: 1,
                pagination: "#foo4_pag",
                swipe: {
                    ontouch: true,
                    onMouse: true
                },
                width: 'variable',
                height: 'variable',
                items: {
                    width: 'auto',
                    visible: 4
                }
            });


            // FOOTER CAROUSEL ARTICLE 
            $("#foo1").carouFredSel({
                auto: true,
                scroll: 1,
                pagination: "#foo1_pag",
                width: 'variable',
                height: 'variable',
                items: {
                    width: 'auto',
                    visible: 1
                },
                swipe: {
                    ontouch: true,
                    onMouse: true
                }
            });
            
            // TESTIMONIALS ALTERNATIVE VERSION
            $('.testimonials-alternative-nav').on('click', 'a', function(e){
                e.preventDefault();
                var $current = $(this);               
                $('.testimonials-alternative-nav a').removeClass();
                $('.testimonials-alternative-content .content').hide();
                $current.addClass('active');
                var contentID = $current.attr('href');
                $('.testimonials-alternative-content').find(contentID).fadeIn();
            });
			
			/* CLIENTS SCROLL */
            $('#client-carousel').carouFredSel({
                prev: '.prev',
                next: '.next',
                auto: false,
                scroll: 1,
                width: 'variable',
                height: 'variable',
                swipe: {
                    ontouch: true,
                    onMouse: true
                },
                items:{
                    width: 'auto',
                    visible: 5
                }
            });

            /* ]]> */
        </script>
</body>
</html>