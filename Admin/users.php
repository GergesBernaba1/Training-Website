<?php  session_start(); ?>
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

	 
	<!-- Default Theme -->
	<link rel="icon" href="images/logo.jpg">
	<meta name="keywords" content="تدريب , التدريب , التدريب والاستشارات , كورسات , ماجستير إدارة اعمال , ادارة اعمال ,ادارة اعمال مصغره , موارد بشرية , اعداد قادة المنظمات , اعداد قادة ادارة مستشفيات , ادارة الجودة , تنمية بشرية , موارد بشرية ,MINI MBA , MBA , HR , TOT , الاكاديمية العربية للتدريب والاستشارات">

	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>


<?php $do = isset($_GET['do'])  ? $_GET['do']  : 'Manage' ; 
	
	if ( isset($_SESSION['admin']) ) {  

	include '../connect.php'; 
	include "temps/navbar.php";

if ($do == "Manage") { 

	$stmt = $con -> prepare("SELECT * FROM admin");
	$stmt ->execute();
	$courses = $stmt -> fetchAll();

	?>
	
	<div class="container" id="main">
		<div class="row">	
			<div class="col-xs-6"><h1 class="text-center">Admins Page</h1></div>
			<div class="col-xs-6" id="add"><a href="?do=Add" class="btn btn-primary btn-block">Add New Admin</a></div>
		

			<table class="table table-bordered main-table text-center">
				<tr>
					<td># ID</td>
					<td>Admin Name</td>
					<td>Password</td>
					<td>Control</td>
				</tr>

				<?php 
				foreach ($courses as $course) {
				echo "<tr>";
					echo "<td>".$course['id'] ."</td>";
					echo "<td>".$course['name'] ."</td>";
					echo "<td>".$course['password'] ."</td>";
					echo "<td>
							<a href='users.php?do=Edit&itemid=". $course['id']."'class='btn btn-success'  id='edit'><i class='fa fa-edit'></i>تعديل</a>
							<a href='users.php?do=Delete&itemid=".$course['id']."'class='btn btn-danger' id='edit'><i class='fa fa-close'></i>حذف</a>";
						  echo "</td>";
				echo "</tr>";
				}
				?>
			</table>

		</div>
	</div>	

 
<?php } elseif ($do == "Add") { ?>
	
		<h1 class="text-center">Add new Admin</h1>

			<div class="container">
				<form class="form-horizontal" action="users.php?do=Insert" method="POST">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Admin name">
						</div>
						<label class="col-sm-2 control-label">Admin name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Password">
						</div>
						<label class="col-sm-2 control-label">Password</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="password" name="pass01" class="form-control" autocomplete="off" placeholder="Confirm Password">
						</div>
						<label class="col-sm-2 control-label">Confirm Password</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="submit" name="submit" value="Add Now" class="btn btn-danger btn-block">
						</div>
					</div>

				</form>

			</div>

<!-- Start insert page -->
<?php } elseif ($do == "Insert") {
	
	if (isset($_POST['submit'])) {
		
		$name 		= $_POST['name'];
		$pass1 		= $_POST['pass'];
		$pass2 	= $_POST['pass01'];
		$pass = '';

		if ($pass1 === $pass2) {
			$pass = $pass1; 
		} else {
			echo "Password Not Matches";
		}

		// foreach ($certifications as $certificate ) {
		// 	echo $certificate;
		// }

		$formErrors = array();

			if (empty($name)) {
				$formErrors [] = 'الاسم لايمكن ان يكون<strong> فارغ</strong>';
			}

			if (empty($pass1)) {
				$formErrors [] = 'كلمة المرور لايمكن ان يكون<strong> فارغ</strong>';
			}


			foreach ($formErrors as $error) {
				echo '<div class="alert alert-danger">'. $error  . '</div>' ;
			}


		$stmt = $con ->prepare("INSERT INTO admin(name,password) VALUES (:name,:pass)");
		$stmt -> execute(array(
			"name"			=> $name,
			"pass"	    	=> $pass
		));

		echo "<div class='alert alert-success'>You have add a new Admin</div>";
		echo "<a href='".$_SERVER['HTTP_REFERER']."' class='btn btn-danger'>Go Back</a>";

	}

} 

// start edit page

elseif ($do == "Edit")  { 

	$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

	$stmt = $con ->prepare("SELECT * FROM admin WHERE id =?");
	$stmt -> execute(array($itemid));
	$rows = $stmt->fetchAll();

	foreach ($rows as $row) {
		
	
		?>
	
				<h1 class="text-center">Update Admin</h1>

			<div class="container">
				<form class="form-horizontal" action="users.php?do=update" method="POST">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>">
						</div>
						<label class="col-sm-2 control-label">Admin name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="pass" class="form-control" value="<?php echo $row['password'] ?>">
						</div>
						<label class="col-sm-2 control-label">password</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="pass01" class="form-control" value="<?php echo $row['password'] ?>">
						</div>
						<label class="col-sm-2 control-label">Confirm password</label>
					</div>
					
					<div class="form-group">
						<div class="col-sm-10">
							<input type="submit" name="edit" value="Update" class="btn btn-danger btn-block">
						</div>
					</div>

					<input type="hidden" name="id" value="<?php echo $itemid ?>">
				</form>

			</div>

<?php }//end foreach 
} elseif ($do == "update")  {

	if (isset($_POST['edit'])) {
		
		$name 		= $_POST['name'];
		$pass1 		= $_POST['pass'];
		$pass2 		= $_POST['pass01'];
		$pass 		= '';
		$ID 		= $_POST['id'];

		if ($pass1 === $pass2) {
			$pass = $pass1; 
		} else {
			echo "Password Not Matches";
		}

		$stmt = $con ->prepare("UPDATE admin SET name=?,password=?WHERE id = ?");

		$stmt -> execute(array($name,$pass,$ID) );

		echo "<div class='alert alert-success'>You have add a new course</div>";
		echo "<a href='users.php' class='btn btn-danger'>Go Home</a>";


	} // isset $_POST['edit']
} elseif ($do == "Delete") {

		echo "<h1 class='text-center'>حذف اعلان</h1>";
		echo "<div class='container'>";

			$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

			$stmt = $con -> prepare ("SELECT * FROM admin WHERE id = ?");
			$stmt -> execute (array($itemid));
			$count = $stmt -> rowCount() ;

			if ($count > 0) {
					$stmt = $con -> prepare('DELETE FROM admin WHERE id = :item');
					$stmt -> bindparam(':item' , $itemid);
					$stmt -> execute();
					echo "<div class='alert alert-danger'>Deleted</div>";
					echo "<a href='users.php' class='btn btn-danger'>Go Home</a>";
					
				}

		echo "</div>";
}  

} else {
	header("location:index.php");
}

 ?>



</body>
</html>	