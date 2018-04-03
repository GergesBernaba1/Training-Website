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


	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:100" rel="stylesheet" /> 
	<link href="https://fonts.googleapis.com/css?family=Katibeh" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Harmattan" rel="stylesheet">

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
						<li><a href="../certificate.php">التحقق من الشهادات </a></li>
						<li><i class="fa fa-user-plus"></i><a href="sign-up.php">التسجيل في دورة جديدة </a></li>
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




<!-- start section content -->
<section class="certify">
	<div class="container">
		<div class="row">

			<h1 class="text-center" style="direction: rtl;">لقد بحثت عن : </h1><hr>
			<h3 class="text-center"><?php echo $_POST['name']; ?></h3>

			<div class="col-xs-12"> 
				<?php 

				$name = $_POST['name'];
					include 'connect.php';
					$stmt = $con -> prepare("SELECT * FROM user_certification WHERE student_name = ?");
					$stmt -> execute(array($name));
					$count = $stmt -> rowCount();
					$rows  = $stmt -> fetchAll();

					if ($count > 0 ) { ?>
						
						<div class="container">
							<div class="row">
								<?php foreach( $rows as $row) { ?>
								<embed src="Admin/certifications/pdf/<?php echo $row['certification']; ?>" type="Application/pdf" width="100%" height="600px" style="margin-bottom: 50px;"></embed>
								<h2 style="margin-bottom: 50px;"><b>Notes :</b><?php echo $row['Notes']; ?></h2>
								<?php } ?>
							</div>
						</div>	
					<?php } else {
						echo "<div class='container'>";
							echo "<div class='alert alert-danger'>This User Has A certification which isn't ready yet</div>";
						echo "</div>";
					}
				 ?>
			</div>

		</div>
	</div>
</section>

<!-- End section content -->





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