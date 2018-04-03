<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>

	<link rel="stylesheet" href="style.css"></link>
	<link rel="icon" href="../images/logo.jpg">
</head>
<body>


<form action="" method="POST">
  <label>
    <input type="text" required name="name"/>
    <div class="label-text">name</div>
  </label>
  <label>
    <input type="password" required name="password" />
    <div class="label-text">Password</div>
  </label>
  <button>Submit</button>
</form>


</body>
</html>


<?php 

	session_start();	

	if (isset($_POST['name'])) {
		include '../connect.php';

		$name = $_POST['name'];
		$pass = $_POST['password'];

		$stmt = $con -> prepare("SELECT name,password FROM admin WHERE name = ? AND password = ? ");
		$stmt -> execute(array( $name , $pass));
		$count = $stmt ->rowCount();
		if ($count > 0) {

			$_SESSION['admin'] = $name ; 
			header('location:courses.php');
			exit();
		} else {
			echo "Wrong Information";
		}
		
	} else{

	}





 ?>