<?php

include_once("config.php");

function query($qry) {
    global $mysqli;
    $mysqli->query("SET CHARACTER SET 'utf8'");
    $mysqli->query("SET character_set_results=utf8");
    $mysqli->query("SET NAMES 'utf8'");
    return $mysqli->query($qry);
}

function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function sendMail($to, $toName, $from, $fromName, $subject, $body) {
    require_once 'lib/swift_required.php';

    //Create the Transport
    $transport = Swift_SmtpTransport::newInstance('smtp.1and1.com', 25)
            ->setUsername('services@sofizar.com')
            ->setPassword('sofizar786')
    ;

    //Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);

    //Create a message
    $message = Swift_Message::newInstance($subject)
            ->setFrom(array($from => $fromName))
            ->setTo(array($to => $toName))
            ->setBody($body, 'text/html');

    //Send the message
    $result = $mailer->send($message);
    return $result;
}

function isLogin() {
    if (isset($_SESSION['UserName']) and isset($_SESSION['UserType']))
        return true;
    else
        return false;
}

function isExpire() {
    if (isset($_SESSION['UserName']) and isset($_SESSION['UserType']) and isset($_SESSION['Membership']))
        if (date("Y-m-d") >= $_SESSION['Membership'])
            return TRUE;
        else
            return FALSE;
    else
        return false;
}

function GetSubCategoryHTML($pCat, $pSubCat) {
    global $cTitle;
    global $sTitle;
    $result = query("SELECT c.Name cname,c.Title ctitle,s.Title stitle,s.Name sname,p.* FROM product p,subcategory s, category c
				where c.id=s.Cat_ID and s.id=p.subcat_id and c.Name='$pCat' and s.name='$pSubCat' ;");
    $cnt = 0;
    $i = 0;
    $html = "";
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        $cTitle = $row["ctitle"];
        $sTitle = $row["stitle"];
        /*if ($cnt == 1) {
            $cnt = 0;
            $html.="</div>";
        }
        if ($cnt == 0) {
            if ($i == 0)
                $html.="<div class=\"span3 margin-right\">";
            else
                $html.="<div class=\"span3 margin-right\">";
        }*/

        $filename = $row["ImageURL"];
        if (!file_exists($filename)) {
            $filename = "images/103.jpg";
        }
        $html.="<li><a href=\"program1.php?name=" . str_replace(" ", "-", $row["Name"]) . "\"> <img src='" . $filename . "' width='185' height='94' /> </a> </li>";
        $cnt++;
        $i++;
    }
    return $html;
}

function GetCategoryHTML($pCat) {
    global $cTitle;
    $result = query("SELECT c.Title ctitle,c.name catname,s.* FROM subcategory s, category c where c.id=s.Cat_ID and c.Name='$pCat' ;");
    $cnt = 0;
    $i = 0;
    $html = "";
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        $cTitle = $row["ctitle"];
       /* if ($cnt == 1) {
            $cnt = 0;
            $html.="</div>";
        }
        if ($cnt == 0) {
            if ($i == 0)
                $html.="<div class=\"span3 margin-right\">";
            else
                $html.="<div class=\"span3 margin-right\">";
        }
*/
        $filename = $row["ImageURL"];
        if (!file_exists($filename)) {
            $filename = "images/103.jpg";
        }
        $html.=" <li> <a href='subcategory.php?cat=" . str_replace(" ", "-", $row["catname"]) . "&subcat=" . str_replace(" ", "-", $row["Name"]) . "'> <img src='" . $filename . "' width='185' height='94' /> </a> </li>";
        $cnt++;
        $i++;
    }
    return $html;
}

function GetProgramHTML($pName, $pEpisode) {
    global $pTitle, $vLink, $pImageURL, $pImageHeading, $pDesc, $pSliderImages;
    $tempVLink = "";
    $result = query("SELECT p.Title pTitle,p.LinkText pLText,p.ImageURL pImageURL,p.ImageHeading pImageHeading,
            p.SliderImages pSliderImages , p.Desc pDesc,v.*, p.cat_ID FROM product p, videos v where p.ID=v.Prod_ID and p.name='$pName';");
    $cnt = 0;
    $i = 0;
    $html = "";
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        
        $tempVLink = $row["pLText"];
        $pTitle = $row["pTitle"];
        $pImageURL = $row["pImageURL"];
        $pImageHeading = $row["pImageHeading"];
        $pSliderImages = $row["pSliderImages"];
        $pDesc = $row["pDesc"];
        
        if ($row["cat_ID"] == 10 or $row["cat_ID"] == 7 or $row["cat_ID"] == 8)
        {
            $html =" ";
            break;
        }
        if ($pEpisode == $row["EpisodeNo"]) {
            $vLink = $row["URL"];
            continue;
        }
        //if ($cnt == 1) {
//            $cnt = 0;
//            $html.="</div>";
//        }
//        if ($cnt == 0) {
//            if ($i == 0)
//                $html.="<div class=\"span3\">";
//            else
//                $html.="<div class=\"span3\">";
//        }

        $filename = $row["ImageURL"];
        if (!file_exists($filename)) {
            $filename = "images/103.jpg";
        }
		$html.="<article class=\"grid_3 alpha team\"> 
        <section class=\"team-info\"> <a href=\"program.php?episode=" . str_replace(" ", "-", $row["EpisodeNo"]) . "&name=" . str_replace(" ", "-", $pName) . "\"><img src=\"$filename\" alt=\"\" /></a>
          <div class=\"title-position\">
            <div class=\"title\">
              <h6>".$row["EpisodeNo"]." حلقة لا</h6>
            </div>
          </div>
        </section>
      </article>";
       // $html.="<div class=\"block gr-box\"> <a href=\"program.php?episode=" . str_replace(" ", "-", $row["EpisodeNo"]) . "&name=" . str_replace(" ", "-", $pName) . "\">
//				  <div class=\"thumbs\" style=\"width: 220px; height: 156px; background-image: url('" . $filename . "');\"> 
//				  <img width=\"0\" src=\"" . $filename . "\"> </div>
//				  <!--<div class=\"small-caps-block\">
//					<h4> Episode No" . $row["EpisodeNo"] . "</h4>
//				  </div>-->
//				  </a> </div>";
        $cnt++;
        $i++;
    }
    if ($vLink == "")
        $vLink = $tempVLink;
    return $html;
}

function GetProgramBreadCrum($pName) {
    global $BreadCrum;
    $tempVLink = "";
    $result = query("SELECT c.name cname,c.title ctitle,s.name sname,s.title stitle,p.title ptitle
                FROM product p,category c, subcategory s
                where c.ID=p.Cat_ID and s.ID=p.SubCat_ID
                and p.name='$pName';");
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
        $BreadCrum["cname"] = $row["cname"];
        $BreadCrum["ctitle"] = $row["ctitle"];
        $BreadCrum["sname"] = $row["sname"];
        $BreadCrum["stitle"] = $row["stitle"];
        $BreadCrum["ptitle"] = $row["ptitle"];
    }
}

function GetAllCategoriesHTML() {
    $result = query("SELECT * FROM `category`;");
    $cnt = 0;
    $i = 0;
    $html = "";
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {

        $filename = $row["ImageURL"];
        if (!file_exists($filename)) {
            $filename = "photos/SMain/S-1.jpg";
        }
		$html.="<article class='grid_3 alpha team'> 
		  <!-- .team-info start -->
		  <section class='team-info'> <img src='$filename' alt='$filename' />
			<div class='title-position'>
			  <div class='title'>
				<h6>" . str_replace(" ", "-", $row["Name"]) . "</h6>
			  </div>
			  <div class='position'> <span><a href='category.php?cat=" . str_replace(" ", "-", $row["Name"]) . "'>Browse Category</a></span> </div>
			</div>
		  </section>
		  <!-- .team-info end --> 
		  
		</article>";
        
        $cnt++;
        $i++;
    }
    return $html;
}
function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);
    $iv = hash('sha256', $secret_iv);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = $decryptedMessage = openssl_decrypt(base64_decode($string), $encrypt_method, $key, $iv);
    }

    return $output;
}

?>