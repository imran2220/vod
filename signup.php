<?php
session_start();
ob_start();
$errMsg = "";
$Insertresult = 0;
include_once("include/functions.php");
$UserDiv = "<div class=\"dop_nav\"><ul>
		<li><a href=\"signup.php\">مستخدم جديد</a></li>
		<li><a href=\"login.php\">تسجيل الدخول</a></li>
		</ul></div>";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Post Parameters

    $UserName = isset($_REQUEST["UserName"]) ? $_REQUEST["UserName"] : "";
    $FullName = isset($_REQUEST["FullName"]) ? $_REQUEST["FullName"] : "";
    $EmailID = isset($_REQUEST["EmailID"]) ? $_REQUEST["EmailID"] : "";
    $Password = isset($_REQUEST["Password"]) ? $_REQUEST["Password"] : "";
    $ConfirmPassword = isset($_REQUEST["ConfirmPassword"]) ? $_REQUEST["ConfirmPassword"] : "";
    $Days = $_POST["Day"]; //isset($_POST["Day"]) ? $_POST["Day"] : "01";
    $Month = isset($_REQUEST["Month"]) ? $_REQUEST["Month"] : "01";
    $Year = isset($_REQUEST["Year"]) ? $_REQUEST["Year"] : "1900";
    $Country = isset($_REQUEST["Country"]) ? $_REQUEST["Country"] : "";
    $Nationality = isset($_REQUEST["Nationality"]) ? $_REQUEST["Nationality"] : "";
    $Gender = isset($_REQUEST["Gender"]) ? $_REQUEST["Gender"] : "";
    $Mobile = isset($_REQUEST["Mobile"]) ? $_REQUEST["Mobile"] : "";

// Validation
    if (($Password <> $ConfirmPassword) or $Password == "") {
        $errMsg = "<div class=\"notice error\"><span class=\"icon medium\" data-icon=\"X\"></span>Password does not Match / كلمة المرور غير متطابقة<a href=\"#close\" class=\"icon close\" data-icon=\"x\"></a></div>";
    }
    if ($Days == "Days" or $Year == "Year" or $Month == "Month") {
        $errMsg .= "<div class=\"notice error\"><span class=\"icon medium\" data-icon=\"X\"></span>Enter the Birthday Correctly / الرجاء ادخال تاريخ الميلاد بشكل صحيح<a href=\"#close\" class=\"icon close\" data-icon=\"x\"></a></div>";
    }
    if (check_email_address($EmailID) == false) {
        $errMsg .= "<div class=\"notice error\"><span class=\"icon medium\" data-icon=\"X\"></span>Enter Email Correctly / الرجاء ادخال تاريخ الميلاد بشكل صحيح<a href=\"#close\" class=\"icon close\" data-icon=\"x\"></a></div>";
    }
    if ($errMsg == "") {
//echo "user: $username , pass:  $password" ;
        if ($Password <> "" && $UserName <> "") {
            $qry = "SELECT * FROM user where username='$UserName' or emailid='$EmailID'";
            //echo $qry;
            $result = query($qry);
            $num_rows = mysqli_num_rows($result);
            //echo $num_rows;

            if ($num_rows == 0) {
                $InsertQry = "INSERT INTO `user` VALUES(
            '$UserName', 'User', '$FullName', '$EmailID', '$Password', '$Mobile', '$Gender', '$Country', 
            '$Nationality', 'Address1', 'Description', '$Year-$Month-$Days', concat(curdate(),' ', curtime()), 
            'InActive', concat(curdate(),' ', curtime()));";

                //echo $InsertQry;
                $Insertresult = query($InsertQry);

                //print($result);
                if ($Insertresult == 1) {
                    // multiple recipients
                    $to = $EmailID;
                    // subject
                    $subject = 'Email Confirmation for sign up at 3at3oot';

                    // message
                    $message = "
				<html>
				<head>
				  <title>Email Confirmation for Sign Up at 3at3oot</title>
				</head>
				<body>
				  <p>Hi $FullName</p>
				  <p>Welcome to 3at3oot.tv!</p>
				  <p>To confirm your user registration, <a href=\"http://www.3at3oot.tv/confirmemail.php?userid=" . encrypt_decrypt('encrypt', $UserName) . "\">Click here</a></p>
				  <p>If you cannot click the full URL above, please copy and paste it into your web browser.</p>
				  <p>Thank you for signing up!</p>
				  <p>3at3oot.tv Team<br \> http://www.3at3oot.tv</p>
				</body>
				</html>
				";

                    // To send HTML mail, the Content-type header must be set
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Additional headers
                    //$headers .= 'To: ' . $EmailID . "\r\n";
                    $headers .= 'From: 3at3oot <info@3at3oot.tv>' . "\r\n";
                    $headers .= 'Bcc: safwansofizer@gmail.com' . "\r\n";

                    // Mail it
                    mail($to, $subject, $message, $headers);
                    $errMsg = "<div class=\"notice success\"><span class=\"icon medium\" data-icon=\"C\"></span>.لقد تم ارسال رسالة فيها رابط الى بريدك الالكتروني، لتفعيل الحساب يرجى الضغط على الرابط<br /> في حال عدم وجود الايميل, يرجى التحقق من مجلد الرسائل غير المهمة <br /><br /> Confirmation Message has been sent to your Email, Kindly Click on the link to activate your account, Check your spam folder if you did not receive the Email. 

 </div>";
                }
            } else {
                $errMsg = "<div class=\"notice error\"><span class=\"icon medium\" data-icon=\"X\"></span> اسم المستخدم أو الايميل الذي اخترته موجود مسبقاً, الرجاء الاختيار من جديد <br /> <br /> ًEmail or Username already Exist, choose new one </div>";
            }
        }
    }
}
include_once("include/usersession.php");
?>
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
<body>

<!-- #header-wrapper start -->
<?php include_once("include/header.php"); ?>
<!-- 3header-wrapper end --> 

<!-- .top-shadow -->
<div class="top-shadow"></div>
<!-- .breadcrump -->
<section class="page-title-container"> 
  
  <!-- .container_12 start -->
  <div class="container_12"> 
    
    <!-- .page-title start -->
    <div class="page-title grid_12">
      <div class="title">
        <h1>Sign up</h1>
      </div>
      <ul class="breadcrumbs">
        <li><a class="home" href="index.php">Home</a></li>
        <li>/</li>
        <li><span class="active">Sign up</span></li>
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
    
    <!-- .grid_6 start -->
    <article class="grid_3"> </article>
    <!-- .grid_6 end --> 
    
    <!-- .grid_6 start -->
    <div class="grid_6">
      <section class="section-title left">
        <h3 class="text-right">Sign up</h3>
      </section>
      <p> Sign up text will come over here if any </p>
      <br />
      
      <!-- wpcf7 start -->
      <form class="wpcf7" id="frmSignup" action="signup.php" method="POST" onsubmit="javascript:alert('done');">
        <fieldset>
          <label><span class="text-color">*</span> Username / اسم المستخدم:</label>
          <input type="text" class="wpcf7-text" name="UserName" id="UserName" />
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Full Name / الاسم الكامل:</label>
          <input type="text" class="wpcf7-text" name="FullName" id="FullName" />
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Email / بريدك الكتروني:</label>
          <input type="email"  name="EmailID" id="EmailID"  class="wpcf7-text" />
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Password / كلمة المرور</label>
          <input type="text" name="Password" id="Password" class="wpcf7-text" />
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Confirm Password /تأكيد كلمة المرور:</label>
          <input type="text"  name="ConfirmPassword" id="ConfirmPassword" class="wpcf7-text" />
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Select Country / بلد الاقامة:</label>
          <select name="Country" id="Country" class="wpcf7-dropdown">
            <option value="US" selected="true">United States</option>
            <option value="AF">Afghanistan (افغانستان)</option>
            <option value="AX">Aland Islands</option>
            <option value="AL">Albania (Shqipëria)</option>
            <option value="DZ">Algeria (الجزائر)</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua and Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia (Հայաստան)</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria (Österreich)</option>
            <option value="AZ">Azerbaijan (Azərbaycan)</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain (البحرين)</option>
            <option value="BD">Bangladesh(বাংলাদেশ)</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus (Белару́сь)</option>
            <option value="BE">Belgium (België)</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin (Bénin)</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan (འབྲུག་ཡུལ)</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia and Herzegovina (Bosna i Hercegovina)</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil (Brasil)</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="BN">Brunei (Brunei Darussalam)</option>
            <option value="BG">Bulgaria (България)</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi (Uburundi)</option>
            <option value="KH">Cambodia (Kampuchea)</option>
            <option value="CM">Cameroon (Cameroun)</option>
            <option value="CA">Canada</option>
            <option value="CV">Cape Verde (Cabo Verde)</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic (République Centrafricaine)</option>
            <option value="TD">Chad (Tchad)</option>
            <option value="CL">Chile</option>
            <option value="CN">China (中国)</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros (Comores)</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, Democratic Republic of the</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Côte d'Ivoire</option>
            <option value="HR">Croatia (Hrvatska)</option>
            <option value="CU">Cuba</option>
            <option value="CY">Cyprus(Κυπρος)</option>
            <option value="CZ">Czech Republic (Česko)</option>
            <option value="DK">Denmark (Danmark)</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="TL">East Timor (Timor-Leste)</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt (مصر)</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea (Guinea Ecuatorial)</option>
            <option value="ER">Eritrea (Ertra)</option>
            <option value="EE">Estonia (Eesti)</option>
            <option value="ET">Ethiopia (Ityop'iya)</option>
            <option value="FK">Falkland Islands</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland (Suomi)</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="TF">French Southern Territories</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia (საქართველო)</option>
            <option value="DE">Germany (Deutschland)</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece ('Eλλας)</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GG">Guernsey</option>
            <option value="GN">Guinea (Guinée)</option>
            <option value="GW">Guinea-Bissau (Guiné-Bissau)</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti (Haïti)</option>
            <option value="HM">Heard Island and McDonald Islands</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong</option>
            <option value="HU">Hungary (Magyarország)</option>
            <option value="IS">Iceland (Ísland)</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran (ایران)</option>
            <option value="IQ">Iraq (العراق)</option>
            <option value="IE">Ireland</option>
            <option value="IM">Isle of Man</option>
            <option value="IL">Israel (ישראל)</option>
            <option value="IT">Italy (Italia)</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan (日本)</option>
            <option value="JE">Jersey</option>
            <option value="JO">Jordan (الاردن)</option>
            <option value="KZ">Kazakhstan (Қазақстан)</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KW">Kuwait (الكويت)</option>
            <option value="KG">Kyrgyzstan (Кыргызстан)</option>
            <option value="LA">Laos (ນລາວ)</option>
            <option value="LV">Latvia (Latvija)</option>
            <option value="LB">Lebanon (لبنان)</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libya (ليبيا)</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania (Lietuva)</option>
            <option value="LU">Luxembourg (Lëtzebuerg)</option>
            <option value="MO">Macao</option>
            <option value="MK">Macedonia (Македонија)</option>
            <option value="MG">Madagascar (Madagasikara)</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives (ގުޖޭއްރާ ޔާއްރިހޫމްޖ)</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania (موريتانيا)</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico (México)</option>
            <option value="FM">Micronesia</option>
            <option value="MD">Moldova</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia (Монгол Улс)</option>
            <option value="ME">Montenegro (Црна Гора)</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco (المغرب)</option>
            <option value="MZ">Mozambique (Moçambique)</option>
            <option value="MM">Myanmar (Burma)</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru (Naoero)</option>
            <option value="NP">Nepal (नेपाल)</option>
            <option value="NL">Netherlands (Nederland)</option>
            <option value="AN">Netherlands Antilles</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="MP">Northern Mariana Islands</option>
            <option value="KP">North Korea (조선)</option>
            <option value="NO">Norway (Norge)</option>
            <option value="OM">Oman (عمان)</option>
            <option value="PK">Pakistan (پاکستان)</option>
            <option value="PW">Palau (Belau)</option>
            <option value="PS">Palestinian Territory</option>
            <option value="PA">Panama (Panamá)</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Peru (Perú)</option>
            <option value="PH">Philippines (Pilipinas)</option>
            <option value="PN">Pitcairn</option>
            <option value="PL">Poland (Polska)</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar (قطر)</option>
            <option value="RE">Reunion</option>
            <option value="RO">Romania (România)</option>
            <option value="RU">Russia (Россия)</option>
            <option value="RW">Rwanda</option>
            <option value="SH">Saint Helena</option>
            <option value="KN">Saint Kitts and Nevis</option>
            <option value="LC">Saint Lucia</option>
            <option value="PM">Saint Pierre and Miquelon</option>
            <option value="VC">Saint Vincent and the Grenadines</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="ST">São Tomé and Príncipe</option>
            <option value="SA">Saudi Arabia (المملكة العربية السعودية)</option>
            <option value="SN">Senegal (Sénégal)</option>
            <option value="RS">Serbia (Србија)</option>
            <option value="CS">Serbia and Montenegro (Србија и Црна Гора)</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore (Singapura)</option>
            <option value="SK">Slovakia (Slovensko)</option>
            <option value="SI">Slovenia (Slovenija)</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia (Soomaaliya)</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia and the South Sandwich Islands</option>
            <option value="KR">South Korea (한국)</option>
            <option value="ES">Spain (España)</option>
            <option value="LK">Sri Lanka</option>
            <option value="SD">Sudan (السودان)</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard and Jan Mayen</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden (Sverige)</option>
            <option value="CH">Switzerland (Schweiz)</option>
            <option value="SY">Syria (سوريا)</option>
            <option value="TW">Taiwan (台灣)</option>
            <option value="TJ">Tajikistan (Тоҷикистон)</option>
            <option value="TZ">Tanzania</option>
            <option value="TH">Thailand (ราชอาณาจักรไทย)</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad and Tobago</option>
            <option value="TN">Tunisia (تونس)</option>
            <option value="TR">Turkey (Türkiye)</option>
            <option value="TM">Turkmenistan (Türkmenistan)</option>
            <option value="TC">Turks and Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine (Україна)</option>
            <option value="AE">United Arab Emirates (الإمارات العربيّة المتّحدة)</option>
            <option value="GB">United Kingdom</option>
            <option value="US">United States</option>
            <option value="UM">United States minor outlying islands</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan (O'zbekiston)</option>
            <option value="VU">Vanuatu</option>
            <option value="VA">Vatican City (Città del Vaticano)</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Vietnam (Việt Nam)</option>
            <option value="VG">Virgin Islands, British</option>
            <option value="VI">Virgin Islands, U.S.</option>
            <option value="WF">Wallis and Futuna</option>
            <option value="EH">Western Sahara (الصحراء الغربية)</option>
            <option value="YE">Yemen (اليمن)</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
            <option value=""></option>
          </select>
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Gender / الجنس:</label>
          <select id="Gender" name="Gender" class="wpcf7-dropdown">
            <option value="MA" selected="true">Male / ذكر</option>
            <option value="FE">Female / أنثى </option>
          </select>
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Mobile / ( موبايل (اختياري)):</label>
          <input type="text" name="Mobile" id="Mobile"  class="wpcf7-text" />
        </fieldset>
        <input type="submit" class="wpcf7-submit" value="Submit" />
      </form>
      <!-- wpcf7 end --> 
    </div>
    <!-- .grid_6 end -->
    
    <article class="grid_3"> </article>
  </div>
  <!-- .container_12 end --> 
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

            /* ]]> */
			
			$(function(){
			$inputs=$('form input[type="text"]:not([type="submit"])');
			$('[type="submit"]').on('click', function(event){
				event.preventDefault();
				$inputs.each(function(){
					if($(this).val()==""){
						$(this).addClass('error');
						}else{
						$(this).removeClass('error');
					}
				});
				if(!$inputs.hasClass('error')){
					$('form').submit();
				}
			});
			
			});
        </script>
		<style>
			input.error{ border-color:red }
		</style>
</body>
</html>
 <?php

function check_email_address($email) {
	// First, we check that there's one @ symbol, and that the lengths are right
	if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
	// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
	return false;
	}
	// Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
	if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
		return false;
	}
	}
	if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
	$domain_array = explode(".", $email_array[1]);
	if (sizeof($domain_array) < 2) {
		return false; // Not enough parts to domain
	}
	for ($i = 0; $i < sizeof($domain_array); $i++) {
		if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
			return false;
		}
	}
	}

	return true;
}
?>