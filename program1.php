<?php
include_once("include/functions.php");

if (isLogin() == false) {
	echo "hiii";
    header("Location: login.php?ref=" . curPageURL());
}

$UserDiv = "<div class=\"loginbar\"><div class='innerDiv'> <a href=\"signup.php\">مستخدم جديد</a> <a href=\"login.php\">تسجيل الدخول</a> </div></div>";
include_once("include/usersession.php");
// Parameters
$pName = isset($_GET['name']) ? $_GET['name'] : "";
$pEpisode = isset($_GET['episode']) ? $_GET['episode'] : "";
if (strtolower($pName) <> "fashion") {
    if ($pEpisode <> "") {
        if (isExpire() == TRUE) {
            header("Location: payment.php?ref=" . curPageURL());
        }
    }
}
$pName = str_replace("-", " ", $pName);

// Fetching Results for Parameters
$BreadCrum = "";
$pTitle = "";
$vLink = "";
$pImageURL = "";
$pImageHeading = "";
$pSliderImages = "";
$pDesc = "";
$Result = GetProgramHTML($pName, $pEpisode);
if ($pImageURL == "" or $pImageURL == "imageurl")
    $pImageURL = "images/El7oor_Populer.jpg";
if ($Result == "")
    $html = "<div class=\"span12\" style=\" width: 730px;overflow: hidden; height: 340px;\">No Results Found.</div>";
else
    $html = "<div class=\"span12\" style=\" width: 100%; margin-right:-20px !important; height: auto;\">" . $Result . "</div>";
GetProgramBreadCrum($pName);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Programs 3at3oot TV</title>
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
        <h1><?php echo $BreadCrum["ptitle"]; ?></h1>
      </div>
      <ul class="breadcrumbs">
        <li><?php echo "<a class=\"home\" href=\"$SITE_NAME\"> ‫الصفحة الرئيسية</a>"; ?></li>
        <li>/</li>
        <li><?php echo "<a href=\"programs.php\"> ‫برامجنا</a>"; ?></li>
        <li>/</li>
        <li><?php echo "<a href=\"category.php?cat=" . str_replace(" ", "-", $BreadCrum["cname"]) . "\">" . $BreadCrum["ctitle"] . "</a>";?></li>
        <li>/</li>
        <li><?php echo "<a href=\"subcategory.php?cat=" . str_replace(" ", "-", $BreadCrum["cname"]) . "&subcat=" . str_replace(" ", "-", $BreadCrum["sname"]) . "\">" . $BreadCrum["stitle"] . "</a>"; ?></li>
        <li>/</li>
        <li><span class="active"><?php echo $BreadCrum["ptitle"]; ?></span></li>
      </ul>
    </div>
    <!-- .page-title end --> 
    
  </div>
  <!-- .container_12 end --> 
</section>

<!-- .rs-wrapper start -->
<section id="content-wrapper"> 
  
  <!-- .container_12 start -->
  <div class="container_12">
    <div class="grid_12">
      <section class="section-title left">
        <h3 class="text-right">Trailer</h3>
      </section>
      <p> Trailer of the drame </p>
      <br />
      <iframe src="//player.vimeo.com/video/76382235" width="930" height="365" align="middle" style="margin-top:10px; margin-right:5px;"> </iframe>
    </div>
    <!-- .grid_6 end -->
    
    <article class="grid_6"> <img src="<?php echo $pImageURL; ?>" alt="" /> </article>
    <!-- .grid_6 .slider-wrapper end --> 
    
    <!-- .grid_6 start -->
    <article class="grid_6">
      <section class="section-title left">
        <h3><?php echo $pImageHeading; ?></h3>
      </section>
      <!-- <span class="text-dark text-big"> We are super creative agency specialized in creating 
      beautiful, clean and responsive premium web themes. </span> <br />--> 
      <br />
      <p style="text-align:right;"> <?php echo $pDesc; ?> </p>
    </article>
    <!-- .grid_6 end -->
    
    <div class="clearfix"></div>
    <!-- .grid_6 start --> 
    
  </div>
  <!-- .container_12 end -->
  
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
            <h2>معرض الصور</h2>
            <span>Browse Photo Gallery</span> </section>
          <div class="carousel-nav-container">
            <ul class="carousel-nav">
              <li> <a class="next" href="#"></a> </li>
            </ul>
          </div>
        </div>
      </section>
      <!-- .section-title .center end -->
      
      <ul id="client-carousel" class="carousel-li">
        <?php
		$ArrPSliderImages = explode("|", $pSliderImages);
		if (count($ArrPSliderImages) > 0) {
			$group = 0;
			$Active = 0;
			foreach ($ArrPSliderImages as &$ImageURL) {
				echo "<li>  <img src=\"$ImageURL\" alt=\"\" />  </li>";
				}
                                                               
        }
		?>
      </ul>
      <!-- .client-carousel end --> 
    </article>
  </div>
  <div class="container_12"> 
    
    <!-- .grid_12 start -->
    <article class="grid_12"> 
      <!-- .section-title .center start -->
      <section class="section-title center">
        <div class="title-container">
          <section class="title">
            <h2>فيديو</h2>
            <span>Drama Episodes</span> </section>
        </div>
      </section>
      <!-- .section-title .center end --> 
      
      <!-- .grid_4 alpha .team start -->
		<?php echo      $Result; ?>
      <!-- .grid_4 .slpha .team end --> 
      
    </article>
    <!-- .grid_12 end --> 
    
  </div>
</section>

<!-- #content-wrapper start --> 
<!-- #content-wrapper end --> 

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
			
			$(window).load(function() {
                $('#slider').nivoSlider();
            });
			
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