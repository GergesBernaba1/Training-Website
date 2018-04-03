<!DOCTYPE html>
<html>
<head>
	<title>Ebdaa</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Harmattan" rel="stylesheet">


	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">

	<link href="dist/aos.css" rel="stylesheet">
	<!-- Basic stylesheet -->
	<link rel="stylesheet" href="owl/owl.carousel.css">
	<link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mada" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
	 
	<!-- Default Theme -->
	<link rel="stylesheet" href="owl/owl.theme.css">

	<link rel="icon" href="images/logo.jpg">
	<meta name="keywords" content="تدريب , التدريب , التدريب والاستشارات , كورسات , ماجستير إدارة اعمال , ادارة اعمال ,ادارة اعمال مصغره , موارد بشرية , اعداد قادة المنظمات , اعداد قادة ادارة مستشفيات , ادارة الجودة , تنمية بشرية , موارد بشرية ,MINI MBA , MBA , HR , TOT , الاكاديمية العربية للتدريب والاستشارات">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<!-- start upperNav section -->
	<section class="upper">

			<nav class="navbar">

				<div class="left col-lg-6 col-xs-12">
					<ul class="list-unstyled">	
						<li><a href="certificate.php">التحقق من الشهادات</a></li>
						<li><a href="sign-up.php"><i class="fa fa-user-plus"></i>التسجيل في دورة جديدة </a></li>
					</ul>
				</div>

			</nav>

	</section>
<!-- End upperNav section -->

<!-- start main NavBar -->
	
	<section class="mainNav">

	<nav class="navbar navbar-inverse">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>

	    <ul class="nav navbar-nav navbar-right">
	    	<li><a href="index.php" id="logo"><img src="images/logo.jpg" class="img img-responsive" style="height: 65px;"></a></li>
		</ul>	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="app-nav">
	      <ul class="nav navbar-nav navbar-left">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">البرامج التدريبية <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <?php 
	            	include 'connect.php';
	            	$stmt2 = $con -> prepare("SELECT * FROM courses");
	            	$stmt2 -> execute();
	            	$rows = $stmt2 -> fetchAll();
	            	foreach ($rows as $row) {
	            		echo "<li><a href='courses/temp.php?course=".$row['course_name']."'>".$row['course_name']."</a></li>";
	            	} 
	             ?>
	          </ul>
	        </li>
	        <li><a href="http://localhost/wordpress/">المدونة</a></li>
	        <li><a href="about.php">عن الأكاديمية</a></li>
	        <li><a href="contact.php">إتصل بنا</a></li>
	      </ul>

	    </div>
	  </div>
	</nav>

	</section>
<!-- End Main NavBar -->


<!-- start courses section -->

<section class="courses" style="margin-bottom: 0;">
<div class="container">
	<div class="row">

		<h1 class="text-center" style="color:#FFF;font-family:'Changa', sans-serif;">مرحبا بكم في صفحة الكورسات</h1><hr>
		<?php 
			
			$stmt = $con -> prepare("SELECT * FROM courses");
			$stmt -> execute();
			$rows = $stmt -> fetchAll();

			foreach ($rows as $row ) {
						
			 ?> 

			<div class="col-lg-3 col-md-4 col-xs-12" id="course">
				<div class="col-xs-12">
					<img src="Admin/courses/<?php echo $row['image'];?>" class="img img-responsive" style="height:250px;">
				</div>
				<div class="col-xs-12">
					<p><?php echo $row['course_name'] ?></p>
				</div>
				<div class="col-xs-12">
					<span><i class="fa fa-shopping-cart"></i><?php echo $row['price'] ?></span>
					<span><i class="fa fa-clock-o"></i><?php echo $row['hours'] ?> hours</span>
					<span><i class="fa fa-map-marker"></i><?php if ($row['location']== 1) {echo " Online" ;} else { echo "Offline";} ?></span>
				</div>
				<div class="col-xs-12">
					<?php 
					// echo "<a class='btn btn-default btn-block' href='courses/temp.php?course=". $row['$course_name']."'>View More</a>"; 

					echo "<a class='btn btn-default btn-block' href='courses/temp.php?course=".$row['course_name']."'>View more</a>";
					?>
				</div>
			</div>

			<?php } ?>
		</div>
	</div>		
	
</section>
	

<!-- End Section -->


<!-- start live chat section -->
<section class="live">
	<div class="chat">
		<a href="#"><h4>leave a message <i class="fa fa-commenting"></i></h4></a>
	</div>

	<a href="#"><i class="fa fa-close" id="close"></i></a><iframe src="live.php"></iframe>
</section>
<!-- end live chat section -->

<!-- start footer section -->
<footer>
	<div class="container">
		<div class="row">
			
			<div class="col-md-4 col-xs-12">
				<div class="col-xs-12" id="abou">
						<h3>About Us</h3><hr>
						<p>نظرا لاهمية الموارد البشرية وانها اهم واعظم الاصول الموجوده فى الحياة 
جاءت فكرة مؤسسة ابداع لتكون احد المؤسسات المسؤلة عن ابراز القدرات البشرية اللامحدودة الموجوده داخل كل انسان
 لمواجهة العقبات والتحديات الفكرية التي تواجه المجتمع 
والتي فرضتها ثورة المعرفة ولمجاراة التطور والتقدم العلمي فى مجال قدرات ومهارات الافراد
 حيث اننا متخصصون فى تقديم برامج تدريبية بطريقة ابداعية فى جميع المجالات الحيايته
 ينفذها مدربون متخصصون وذلك مساهمة منا فى تطوير المؤسسات والافراد 
من خلال احدث وسائل التدريب الحديثة تضع مؤسسة ابداع
خبراتها بين ايديكم لتكون احد الابواب التي ستنطلقون منها بمشيئة الله الى النجاح والسعادة فى الحياة</p>
					</div>
			</div>			

			<div class="col-md-4 col-xs-12">
				<div class="col-xs-12" id="import">
						<h3>روابط مهمة</h3><hr>
						<ul>
							<li><a href="hash.php">الدورات التدريبية</a></li>
							<li><a href="gallery.php">البوم الصور</a></li>
							<li><a href="certificate.php">التحقق من الشهادات</a></li>
							<li><a href="http://localhost/wordpress/">المدونة</a></li>
						</ul>
					</div>
			</div>

			<div class="col-md-4 col-xs-12">
					
				<div class="col-xs-12" id="call">
					<h3>Call Us</h3><hr>
					<p><i class="fa fa-map-marker"></i> 5 شارع صبري أبو علم - محطة مترو محمد نجيب - القاهرة - مصر</p>
					<p><i class="fa fa-mobile"></i> 01007171804</p>
					<p><i class="fa fa-phone-square"></i> 0223962077</p>
					<p><i class="fa fa-envelope-o"></i> info@ebdaa.net.eg</p>
					<ul class="list-unstyled" style="margin-top:25px;">
						<li><a href="https://www.facebook.com/cftcgroup/" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/ebdaa_eg" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/112685390544569668499" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="https://www.linkedin.com/in/%D9%85%D8%A4%D8%B3%D8%B3%D8%A9-%D8%A5%D8%A8%D8%AF%D8%A7%D8%B9-%D9%84%D9%84%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8-%D9%88%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D8%B4%D8%A7%D8%B1%D8%A7%D8%AA-a02824148/?lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3BtHFR6hG4T6mkAu4%2FzGrxSw%3D%3D&licu=urn%3Ali%3Acontrol%3Ad_flagship3_feed-nav.settings_view_profile" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UC5KKtWKUMtbsDqtYTuOmuAw" target="_blank"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-xs-12" id="under">			
				<div class="col-xs-8" id="visa">
					<div class="col-md-2 col-xs-4 col-md-offset-3"><img src="images/master.ico" class="img img-responsive"></div>
					<div class="col-md-2 col-xs-4"><img src="images/visa.png" class="img img-responsive"></div>
					<div class="col-md-2 col-xs-4"><img src="images/vodafone.png" class="img img-responsive" style="margin-top: 20px;"></div>
					<div class="col-md-2 col-xs-4"><img src="images/paypal.png" class="img img-responsive"></div>
				</div>
				<div class="col-xs-4" id="copy"><span>© جميع الحقوق محفوظة لأكاديمية ابداع للتدريب والاستشارات</span></div>
			</div>


		</div>
	</div>
</footer>
<!-- start footer section -->


<div class="scrollToTop">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</div>

<script src="dist/aos.js"></script>
<script type="text/javascript">
	AOS.init({
        easing: 'ease-in-out-sine'
      });
</script>

<script src="owl/owl.carousel.min.js"></script>
<script src="main.js"></script>	
</body>
</html>
