<!-- #header-wrapper start -->
<section id="header-wrapper" class="clearfix"> 
  <!-- #header start -->
  <header id="header" class="clearfix"> 
    
    <!-- #logo start -->
    <section id="logo"> <a href="index.php"> <img src="images/logo.png" alt="logo" /> </a> </section>
    <!-- #logo end --> 
    
    <!-- contact-info-container -->
    <section id="contact-info-container">
      
      <?php
	  	echo $UserDiv;	  ?>
      </ul>
      <ul class="social-links">
        <li> <a href="#" class="pixons-twitter-1"></a> </li>
        <li> <a href="#" class="pixons-linkedin"></a> </li>
        <li> <a href="#" class="pixons-facebook-1"></a> </li>
        <li> <a href="#" class="pixons-xing"></a> </li>
        <li> <a href="#" class="pixons-skype"></a> </li>
      </ul>
    </section>
    <!-- .contact-info-container end --> 
  </header>
  <!-- #header end --> 
  
  <!-- #nav-container start -->
  <section id="nav-container">
    <section class="container_12">
      <section class="grid_12"> 
        <!-- #nav start -->
        <nav id="nav">
         <?php  $currentPage = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
        <ul id="navigation">
         <li <?php if($currentPage=="http://www.3at3oot.tv/"): ?>class="active" <?php endif; ?>><a href="http://www.3at3oot.tv/">الصفحة الرئيسية </a></li>
         <li <?php if($currentPage=="http://www.3at3oot.tv/programs.php"||$currentPage=="http://www.3at3oot.tv/category.php?cat=tv-series" ||$currentPage=="http://www.3at3oot.tv/category.php?cat=films"||$currentPage=="http://www.3at3oot.tv/category.php?cat=cartoons"||$currentPage=="http://www.3at3oot.tv/category.php?cat=cinema"||$currentPage=="http://www.3at3oot.tv/category.php?cat=events"||$currentPage=="http://www.3at3oot.tv/category.php?cat=documentary"||$currentPage=="http://www.3at3oot.tv/category.php?cat=fashion"): ?>class="current-menu-item" <?php endif; ?>><a href="programs.php">برامجنا </a>
          		<ul>
                	<li><a href="category.php?cat=TV-Series">مسلسلات</a></li>
                    <li><a href="category.php?cat=Films">أفلام</a></li>
                    <li><a href="category.php?cat=Cartoons">كرتون</a></li>
                    <li><a href="category.php?cat=Cinema">سينما</a></li>
                    <li><a href="category.php?cat=Events">فعاليات ترفيهية</a></li>
                    <li><a href="category.php?cat=Documentary">وثائقي</a></li>
                    <li><a href="category.php?cat=Fashion">الموضة والجمال</a></li>
                </ul>
          </li>
         <li <?php if($currentPage=="http://www.3at3oot.tv/news.php"): ?>class="current-menu-item" <?php endif; ?>><a href="news.php"> أخبار</a></li>
         <li <?php if($currentPage=="http://www.3at3oot.tv/advice.php"): ?>class="current-menu-item" <?php endif; ?>><a href="advice.php">نصيحة</a></li>
         <li <?php if($currentPage=="http://www.3at3oot.tv/advertise-with-us.php"): ?>class="current-menu-item" <?php endif; ?>><a href="advertise-with-us.php"> أعلن معنا</a></li>
         <li <?php if($currentPage=="http://www.3at3oot.tv/contact.php"): ?>class="current-menu-item" <?php endif; ?>><a href="contact.php"> اتصل بنا</a></li>
         <li <?php if($currentPage=="http://www.3at3oot.tv/free-show.php"): ?>class="current-menu-item" <?php endif; ?>><a href="free-show.php"> العروض المجانية </a></li>
        </ul>
          
        </nav>
        <!-- #nav end --> 
        
        <!-- responsive navigation start -->
        <select id="nav-responsive">
          <option selected="" value="">Site Navigation...</option>
          <option value="index.html">Home</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
          <option value="#">Link</option>
        </select>
        <!-- responsive navigation end --> 
        
      </section>
      <!-- .grid_12 end --> 
    </section>
    <!-- .container_12 end --> 
    
  </section>
  <!-- #nav-container end --> 
</section>
<!-- 3header-wrapper end --> 