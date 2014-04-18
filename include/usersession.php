
<?php

$UserDiv="	<ul class=\"info\">
			<li> <a class=\"signup\" href=\"signup.php\">Signup</a> </li>
        	<li> <a class=\"login\" href=\"login.php\">Login</a> </li>
			</ul>";
		
if(isset($_SESSION['UserName']) and isset($_SESSION['UserType']))
{
	if(strtolower($_SESSION['UserType'])=="admin")
	{
		//$UserDiv="Welcome ".$_SESSION['UserName']."
		$UserDiv="
		<ul class=\"info\">
		<li> <a href=\"#\" class=\"login\"> Welcome ".$_SESSION['UserName']."</a></li>
		<li><a class=\"signup\" href='userlist.php'>User List</a></li>
		<li><a class=\"login\" href='logout.php'>Logut</a></li>
		</ul>";
	}
	else
	{
            $ExMsg="";
            if (isExpire() == TRUE)
            {
                $ExMsg="لايوجد اشتراك";//.$_SESSION['Membership'];
            }
            else
            {
                $ExMsg=" اشتراكك ينتهي بتاريخ ".$_SESSION['Membership'];
            }
            //$UserDiv="Welcome ".$_SESSION['UserName']."
			$UserDiv="
			<ul  class=\"info\">
			<li> <a href=\"#\" class=\"login\"> Welcome ".$_SESSION['UserName']."</a></li>
            <li> <a href=\"#\" class=\"signup\"> $ExMsg</a></li>
            <li><a class=\"login\" href='logout.php'>تسجيل الخروج</a></li>
            </ul>";	
	}
		
	
}

?>