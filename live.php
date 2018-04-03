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
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Harmattan" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="style.css">

	<script src="main.js"></script>
</head>
<body>

	<?php 
	// start define do variable to transfer from one page to an other
	$do = isset($_GET['do'])  ? $_GET['do']  : 'Manage' ;  

	// start Manage Page
		if ($do == "Manage") {
	?>


		<section class="mini">
			<div class="container">
				<div class="col-xs-12">
					<div class="col-xs-10"><h4>Send Us Message</h4></div>
					<div class="col-xs-2"><a href="#"><i class="fa fa-close"></i></a></div>
				</div>
			</div>	
		

			<form action="?do=insert" method="post" id="leave">
		
		<div class="form-group">
			<label class="col-sm-2 control-label">الاسم</label>
			<div class="col-sm-10">
				<input type="text" name="name" class="form-control" autocomplete="off" placeholder="الإسم" required>
			</div>
		</div>

		<div class="form-group">	
		<label class="col-sm-2 control-label">الايميل</label>		
			<div class="col-sm-10">
				<input type="email" name="email" class="form-control" autocomplete="off" placeholder="الإيميل" required>
			</div>		
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">الهاتف</label>
			<div class="col-sm-10">
				<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="الهاتف" required>
			</div>	
		</div>

		<div class="form-group">	
			<label class="col-sm-2 control-label">الرسالة</label>
			<div class="col-sm-10">
				<input class="form-control" placeholder="الرسالة" style="height:100px;" name="message" required>
			</div>	
		</div>

		<div class="form-group">
			<div class="col-sm-10">
				<input type="submit" name="upload" value="Send" class="btn btn-danger btn-block" style="margin-top:10px;">
			</div>
		</div>



	</form>

	</section>

	<?php
	// start insert page
	 } elseif ($do=="insert") {

		echo "<h1 class='text-center'>شكرا لتواصلك معنا</h1>"; 
		echo "<div class='container'>";

			//check if the user come from form or not
			if ($_SERVER['REQUEST_METHOD'] == "POST") { 
				// include configuration file
				include 'connect.php';

				// post user's input to variables
				$email	= '';
				$name 	= $_POST['name'];  
				$mail	= $_POST['email'] ;
				$phone	= $_POST['phone'];
				$message= $_POST['message'];

				// if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $mail)){
				//     // Return Error - Invalid Email
				//     echo 'The email you have entered is invalid, please try again.';
				// }else{
				//     // Return Success - Valid Email
				//     $email = $mail ;
				// }
 
				if (filter_var($mail, FILTER_VALIDATE_EMAIL) ) {
					$email = $mail ;

					//start statement code
					$stmt = $con -> prepare("INSERT INTO messages (name,email,phone,message) VALUES (:name , :email , :phone , :message)");
					$stmt -> execute(array(
						'name'  	=> $name,
						'email' 	=> $email,
						'phone'  	=> $phone,
						'message'  	=> $message
					));
					$count = $stmt->rowCount();

					if ($count > 0) {
							echo "<div class='alert alert-success'>شكرا لتواصلك معنا</div>";
						} else {
							echo "<div class='alert alert-danger'>حدث خطأ ما برجاء المحاولة مرة أخري</div>";
						}


				} else {
					echo "Invalid Email ";
					echo "<a class='btn btn-danger' href='".$_SERVER['HTTP_REFERER']."'>Return Back</a>";
				}	
				
				}

		echo "</div>";



	} ?>



</body>
