<?php
include_once("include/functions.php");
require("phpmailer.php");
if(isset($_REQUEST['name']) and ($_REQUEST['name']!='') and isset($_REQUEST['email']) and($_REQUEST['email']!='') and isset($_REQUEST['subject']) and isset($_REQUEST['message'])){								
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$subject=$_REQUEST['subject'];	
	$message=$_REQUEST['message'];				
	$mail = new PHPMailer();
	$mail->IsMail();
	$mail->Timeout  = 36000;
	$mail->Subject = "Feedback from 3at3oot contact page";
	$from = $email;
	$mail->From = $email;
	$mail->FromName = $email;
	$mail->AddReplyTo('info@3at3oot.tv', $from);
	$to = 'info@3at3oot.tv';
	$cc = 'imran2220@gmail.com';
	$mail->AddAddress($to, '');
	//$mail->AddAttachment("file_uploads/" . $file_name);
	$mail->Body = '
		<html>
		<head>
		<title></title>
		</head>
		<body>
				<h3 style="color:#4C391F;"> Full Name  :</h3>'.$name.'
				<br />
					<h3 style="color:#4C391F;">Email Address:</h3>'.$email.'						
				<br />
					<h3 style="color:#4C391F;">Subject:</h3>'.$subject.'
				<br />
					<h3 style="color:#4C391F;">Message </h3>'.$message.'
				<br />
		</body>
		</html>';
		$mail->IsHTML(true);
				//$mail->Send();
	if(!$mail->Send()) {
	$error="Mail Not Sent Successfully";

	}
	else{
	$Success="Mail Sent Successfully";
	} 
}?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>3at3oot.TV</title>
<meta name="description" content="Online TV ">
<meta name="author" content="pixel-industry">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">

<!-- stylesheets -->
<?php include_once("include/head.php"); ?>
</head>

<body>

<!-- #header-wrapper start -->
<?php include_once("include/header.php"); ?>
<!-- 3header-wrapper end --> 

<!-- .top-shadow -->
<div class="top-shadow"></div>
<section class="page-title-container"> 
  
  <!-- .container_12 start -->
  <div class="container_12"> 
    
    <!-- .page-title start -->
    <div class="page-title grid_12">
      <div class="title">
        <h1>Contact us</h1>
      </div>
      <ul class="breadcrumbs">
        <li><a  class="home" href="index.php">Home</a></li>
        <li>/</li>
        <li><span class="active">Contact</span></li>
      </ul>
    </div>
    <!-- .page-title end --> 
  </div>
  <!-- .container_12 end --> 
</section>
<!-- .page-title-container end --> 

<!-- #content-wrapper start -->
<section id="content-wrapper"> 
  
  <!-- .container_12 start -->
  <div class="container_12"> 
    
    <!-- .grid_6 start -->
    <article class="grid_6"> 
      
      <!-- .map-info-container start -->
      <section class=" map-info-container"> 
        
        <!-- .info-container start -->
        <section class="info-container">
          <h5>اتصل بنا</h5>
          <ul>
            <li> <span class="text-dark">العنوان  </span> دبي – الامارات العربية المتحدة </li>
            <li> <span class="text-dark">هاتف: </span> 3629856 4 00971 </li>
            <li> <span class="text-dark">ايميل: </span> <a href="mailto:info@3at3oot.tv">info@3at3oot.tv </a> </li>
            <li> <span class="text-dark">صندوق بريد </span> 487565  Dubai </li>
            <li> <span class="text-dark">ساعات العمل: </span> الأحد – الخميس       ١٠:٠٠ صباحاً - ٦:٠٠ مساءً  </li>
          </ul>
          <br />
         <!-- <br />
          <h5>Support Center</h5>
          <ul>
            <li> <span class="text-dark">Address: </span> Some Street, Sweet Park Avenue, Amsterdam, Europe </li>
            <li> <span class="text-dark">Telephone: </span> +00 125 6848 </li>
            <li> <span class="text-dark">Email: </span> <a href="mailto:support@pixel-industry.com">support@business.com</a> </li>
          </ul>-->
        </section>
        <!-- .info-container end --> 
      </section>
      <!-- .map-info-container end --> 
    </article>
    <!-- .grid_6 end --> 
    
    <!-- .grid_6 start -->
    <div class="grid_6">
      <section class="section-title left">
        <h3>هل لديك أي استفسار ؟
</h3>
      </section>
      <p> اذا كان لديك أي استفسار الرجاء املأ الطلب التالي وسنقوم بالرد عليك في خلال ٢٤ ساعة ماعدا أيام العطلة الأسبوعية، في هذه الحالة سنتواصل معك يوم الأحد
 </p>
      <br />
      
      <!-- wpcf7 start -->
      <form class="wpcf7" action="" method="post">
        <fieldset>
          <label><span class="text-color">*</span> Your Name /الاسم الكامل</label>
          <input type="text" class="wpcf7-text" name="name"/>
        </fieldset>
        <!--<fieldset>
          <label><span class="text-color">*</span> Last Name </label>
          <input type="text" class="wpcf7-text" id="lastname"/>
        </fieldset>-->
        <fieldset>
          <label><span class="text-color">*</span> Email / بريدك الكتروني</label>
          <input type="email" name="email" id="email" class="wpcf7-text" />
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Subject / موضوع</label>
          <input type="text" id="subject" class="wpcf7-text" />
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Message / الرسالة</label>
          <textarea rows="10" class="wpcf7-textarea" id="message"></textarea>
        </fieldset>
        <input type="submit" class="wpcf7-submit" value="Submit / ارسل" />
      </form>
      <!-- wpcf7 end --> 
    </div>
    <!-- .grid_6 end --> 
    
  </div>
  <!-- .container_12 end --> 
</section>
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

            /* ]]> */
        </script>
</body>
</html>