<?php
session_start();
ob_start();
$errMsg = "";
include_once("include/functions.php");
$UserDiv = "<div class=\"dop_nav\"><ul>
		<li><a href=\"signup.php\">مستخدم جديد</a></li>
		<li><a href=\"login.php\">تسجيل الدخول</a></li>
		</ul></div>";
$ref = trim(isset($_REQUEST["ref"]) ? $_REQUEST["ref"] : "");
//echo $ref;
$username = isset($_REQUEST["UserName"]) ? $_REQUEST["UserName"] : "";
$password = isset($_REQUEST["Password"]) ? $_REQUEST["Password"] : "";

//echo "user: $username , pass:  $password" ;

if ($password <> "" && $username <> "") {
    $qry = "SELECT username,password,status,usertype,DOExpire 
            FROM user where (username='$username' or emailid='$username') and password='$password'  ;";
    //echo $qry;
    $result = query($qry);
    $num_rows = $result->num_rows;
    //echo $num_rows;
    if ($num_rows > 0) {
        $row = $result->fetch_row();
        if ($row[2] == "InActive") {
            $errMsg = "<div class=\"notice error\"><span class=\"icon medium\" data-icon=\"X\"></span>يرجى تأكيد تفعيل الحساب من بريدك الالكتروني, <a href='resendverficationcode.php?UserName=".encrypt_decrypt('encrypt', $row[0])."'> اضغط هنا لارسال رسلة التفعيل مرة ثانية </a><br /><br /> Please activate your account through the link you received in the email<br /><br /> 
						<a href='resendverficationcode.php?UserName=".encrypt_decrypt('encrypt', $row[0])."'>Resend Activation Code? Click Here </a><br /><br /> or send email to support@3at3oot.tv</div>";
        } else {

              $_SESSION['UserName'] =  $row[0];
              $_SESSION['UserType'] = $row[3];
              $_SESSION['Membership'] = $row[4];
            if (strtolower($row[3]) == "user") {
                if ($ref == "")
                    header("Location: index.php");
                else
                    header("Location: " . $ref);
            }
            else {
                header("Location: userlist.php");
            }
        }
    } else {
        $errMsg = "<div class=\"notice error\"><span class=\"icon medium\" data-icon=\"X\"></span>يوجد خطأ في اسم المستخدم أو كلمة المرور <br /> <br />User Name or Password is Incorrect</div>";
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
<?php include_once("include/head.php"); ?></head>

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
        <h1>Login</h1>
      </div>
      <ul class="breadcrumbs">
        <li><?php echo "<a class=\"home\" href=\"$SITE_NAME\"> ‫الصفحة الرئيسية</a>"; ?></li>
        <li>/</li>
        <li><span class="active">Login</span></li>
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
    <!-- .grid_6 end -->
    <div class="grid_6">
      <section class="section-title left">
        <h3 class="text-right">Sign Up</h3>
      </section>
      <p>Sign up Text will come here</p>
      <br />
      
      <!-- wpcf7 start -->
      <!--<form class="wpcf7" action="signup.php">
        <input type="submit"  class="wpcf7-submit" value="Submit" />
      </form>-->
      <!-- wpcf7 end --> 
    </div>
    <!-- .grid_6 start -->
    <div class="grid_6">
      <section class="section-title left">
        <h3 class="text-right">Login</h3>
      </section>
      <?php
if($errMsg<>"")
{
	echo " <div class=\"error-box\">
	$errMsg </div>";
}

?>
      <br />
      
      <!-- wpcf7 start -->
      <form class="wpcf7" action="login.php" method="post" id="frmLogin">
        <fieldset>
          <label><span class="text-color">*</span> Username / اسم المستخدم </label>
          <input type="text" class="wpcf7-text" id="UserName" name="UserName" placeholder="username" />
          
        </fieldset>
        <fieldset>
          <label><span class="text-color">*</span> Password / كلمة المرور </label>
          <input type="password" id="Password" name="Password" class="wpcf7-text" />
        </fieldset>
        <input type="submit" class="wpcf7-submit" value="Submit" />
      </form>
      <!-- wpcf7 end --> 
    </div>
    <!-- .grid_6 end --> 
    
  </div>
  <!-- .container_12 end --> 
</section>

<!-- #Error --> 

<!-- #Error end --> 

<!-- #footer-wrapper start -->
<?php include_once("include/footer.php"); ?>
<!-- #footer-wrapper end --> 

<!-- scripts --> 
<script  src="js/jquery-1.8.3.js"></script> <!-- jQuery library --> 


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