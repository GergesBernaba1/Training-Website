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

	$stmt = $con -> prepare("SELECT * FROM user_certification");
	$stmt ->execute();
	$courses = $stmt -> fetchAll();

	?>
	
	<div class="container" id="main">
		<div class="row">	
			<div class="col-xs-6"><h1 class="text-center">User Certifications Page</h1></div>
			<div class="col-xs-6" id="add"><a href="?do=Add" class="btn btn-primary btn-block">Add New Certification</a></div>
		

			<table class="table table-bordered main-table text-center">
				<tr>
					<td># ID</td>
					<td>Participant Name</td>
					<td>Course Name</td>
					<td>certificatoins</td>
					<td>Notes</td>
					<td>Control</td>
				</tr>

				<?php 
				foreach ($courses as $course) {
				echo "<tr>";
					echo "<td>".$course['id'] ."</td>";
					echo "<td>".$course['student_name'] ."</td>";
					echo "<td>".$course['course_name'] ."</td>";
					echo "<td>".$course['certification'] ."</td>";
					echo "<td>".$course['Notes'] ."</td>";
					echo "<td>
							<a href='userCertification.php?do=Edit&itemid=". $course['id']."'class='btn btn-success'  id='edit'><i class='fa fa-edit'></i>تعديل</a>
							<a href='userCertification.php?do=Delete&itemid=".$course['id']."'class='btn btn-danger' id='edit'><i class='fa fa-close'></i>حذف</a>";
						  echo "</td>";
				echo "</tr>";
				}
				?>
			</table>

		</div>
	</div>	

 
<?php } elseif ($do == "Add") { ?>
	
		<h1 class="text-center">Add new Certification</h1>

			<div class="container">
				<form class="form-horizontal" action="userCertification.php?do=Insert" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Participant name">
						</div>
						<label class="col-sm-2 control-label">Participant name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="course" class="form-control" autocomplete="off" placeholder="Course Name">
						</div>
						<label class="col-sm-2 control-label">Course Name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="file" name="certifications" class="form-control">
						</div>
						<label class="col-sm-2 control-label">certifications</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<textarea class="form-control" name="Notes" style="height: 120px;"></textarea>
						</div>
						<label class="col-sm-2 control-label">Notes</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="submit" name="submit" value="اضف الاعلان" class="btn btn-danger btn-block">
						</div>
					</div>

				</form>

			</div>

<!-- Start insert page -->
<?php } elseif ($do == "Insert") {
	
	if (isset($_POST['submit'])) {
		
		echo "<h1 class='text-center'>أضافه اعلان</h1>";
		echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			    $errors= array();
			    $file_name = $_FILES['certifications']['name'];
			    $file_size =$_FILES['certifications']['size'];
			    $file_tmp =$_FILES['certifications']['tmp_name'];
			    $file_type=$_FILES['certifications']['type'];
			      
			    if(empty($errors)==true){
			        move_uploaded_file($file_tmp,"certifications/pdf/".$file_name);
			    }else{
			        print_r($errors);
			    }

				$name 			= $_POST['name'];
				$course 		= $_POST['course'];
				$certifications = $file_name;
				$code 			=$_POST['Notes'];

				$formErrors = array();

					if (empty($name)) {
						$formErrors [] = 'الاسم لايمكن ان يكون<strong> فارغ</strong>';
					}

					if (empty($file_name)) {
						$formErrors [] = 'الملف لايمكن ان يكون<strong> فارغ</strong>';
					}

					if (empty($course)) {
						$formErrors [] = 'يجب أختيار<strong> الكورس</strong>';
					}

					foreach ($formErrors as $error) {
						echo '<div class="alert alert-danger">'. $error  . '</div>' ;
					}

					// check if there is no errors

					if (empty($formErrors)) {	
								
					$stmt = $con -> prepare ("INSERT INTO user_certification(student_name , course_name,certification,Notes) VALUES (:name ,:course ,:image,:code)");
					$stmt -> execute(array(
						'name' 		=> 	$name,
						'course'	=>  $course,
						'image' 	=> 	$certifications,
						'code'		=>	$code 
							));
					echo "<div class='alert alert-success'>" .$stmt -> rowCount() . " اعلان تمت اضافته</div>";
					echo "<a href='userCertification.php' class='btn btn-success'>Go Back</a>";		
				} 
			  }	
			echo "</div>";
}

} 

// start edit page

elseif ($do == "Edit")  { 

	$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

	$stmt = $con ->prepare("SELECT * FROM user_certification WHERE id =?");
	$stmt -> execute(array($itemid));
	$rows = $stmt->fetchAll();

	foreach ($rows as $row) {
		
	
		?>
	
				<h1 class="text-center">Update Certification </h1>

			<div class="container">
				<form class="form-horizontal" action="userCertification.php?do=update" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" value="<?php echo $row['student_name'] ?>">
						</div>
						<label class="col-sm-2 control-label">student name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="course" class="form-control" value="<?php echo $row['course_name'] ?>">
						</div>
						<label class="col-sm-2 control-label">Course</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="certifications" class="form-control" value="<?php echo $row['certification'] ?>">
							<input type="file" name="new">
						</div>
						<label class="col-sm-2 control-label">certifications</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<textarea class="form-control" name="notes" style="height: 120px;"> <?php echo $row['Notes']; ?> </textarea>
						</div>
						<label class="col-sm-2 control-label">Notes</label>
					</div>
					
					<div class="form-group">
						<div class="col-sm-10">
							<input type="submit" name="edit" value="اضف الاعلان" class="btn btn-danger btn-block">
						</div>
					</div>

					<input type="hidden" name="id" value="<?php echo $itemid ?>">
				</form>

			</div>

<?php }//end foreach 
} elseif ($do == "update")  {

	if (isset($_POST['edit'])) {

		$cert = "";

		if (empty($_FILES['new'])) {
			$cert = $_POST['certifications'];
		} else {
		
		echo "<h1 class='text-center'>Update</h1>";
		echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			    $errors= array();
			    $file_name = $_FILES['new']['name'];
			    $file_size =$_FILES['new']['size'];
			    $file_tmp =$_FILES['new']['tmp_name'];
			    $file_type=$_FILES['new']['type'];
			      
			    if(empty($errors)==true){
			        move_uploaded_file($file_tmp,"certifications/".$file_name);
			    }else{
			        print_r($errors);
			    }

				$name 			= $_POST['name'];
				$cert 			= $file_name;
				$id 			= $_POST['id'];
				$course 		= $_POST['course'];
				$notes 			= $_POST['notes'];

				$formErrors = array();

					if (empty($name)) {
						$formErrors [] = 'الاسم لايمكن ان يكون<strong> فارغ</strong>';
					}

					if (empty($notes)) {
						$formErrors [] = 'يجب أختيار<strong> نوع الحجر</strong>';
					}

					foreach ($formErrors as $error) {
						echo '<div class="alert alert-danger">'. $error  . '</div>' ;
					}

					// check if there is no errors

					if (empty($formErrors)) {	
								
					$stmt = $con -> prepare ("UPDATE user_certification SET student_name=? ,course_name=? , certification = ? , Notes = ?  WHERE id = ?");
					$stmt -> execute(array($name,$course,$cert,$notes,$id));
					echo "<div class='alert alert-success'>" .$stmt -> rowCount() . " اعلان تمت اضافته</div>";
					echo "<a href='userCertification.php' class='btn btn-success'>Go Back</a>";		
				} 
			  }	
			echo "</div>";
} 

} 
} elseif ($do == "Delete") {

		echo "<h1 class='text-center'>حذف اعلان</h1>";
		echo "<div class='container'>";

			$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

			$stmt = $con -> prepare ("SELECT * FROM user_certification WHERE id = ?");
			$stmt -> execute (array($itemid));
			$count = $stmt -> rowCount() ;

			if ($count > 0) {
					$stmt = $con -> prepare('DELETE FROM user_certification WHERE id = :item');
					$stmt -> bindparam(':item' , $itemid);
					$stmt -> execute();
					echo "<div class='alert alert-danger'>Deleted</div>";
					echo "<a href='userCertification.php' class='btn btn-danger'>Go Home</a>";
					
				}

		echo "</div>";
}  

} else {
	header("location:index.php");
}

 ?>



</body>
</html>	