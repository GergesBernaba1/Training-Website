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

	$stmt = $con -> prepare("SELECT * FROM courses");
	$stmt ->execute();
	$courses = $stmt -> fetchAll();

	?>
	
	<div class="container" id="main">
		<div class="row">	
			<div class="col-xs-6"><h1 class="text-center">Courses Page</h1></div>
			<div class="col-xs-6" id="add"><a href="?do=Add" class="btn btn-primary btn-block">Add New Course</a></div>
		

			<table class="table table-bordered main-table text-center">
				<tr>
					<td># ID</td>
					<td>course Name</td>
					<td>Price</td>
					<td>location</td>
					<td>language</td>
					<td>hours</td>
					<td>intro</td>
					<td id="width">Body Intro</td>
					<td>details</td>
					<td id="width">Body Details</td>
					<td>certifications</td>
					<td>lecturer</td>
					<td>Control</td>
				</tr>

				<?php 
				foreach ($courses as $course) {
				echo "<tr>";
					echo "<td>".$course['id'] ."</td>";
					echo "<td>".$course['course_name'] ."</td>";
					echo "<td>".$course['price'] ."</td>";
					echo "<td>".$course['location'] ."</td>";
					echo "<td>".$course['language'] ."</td>";
					echo "<td>".$course['hours'] ."</td>";
					echo "<td>".$course['intro'] ."</td>";
					echo "<td id='width'>".substr($course['body_intro'] , 0 , 100)."</td>";
					echo "<td>".$course['details'] ."</td>";
					echo "<td id='width'>".substr($course['body_details'] , 0,150)."</td>";
					echo "<td>".$course['certifications'] ."</td>";
					echo "<td>".$course['lecturer'] ."</td>";
					echo "<td>
							<a href='courses.php?do=Edit&itemid=". $course['id']."'class='btn btn-success'  id='edit'><i class='fa fa-edit'></i>تعديل</a>
							<a href='courses.php?do=Delete&itemid=".$course['id']."'class='btn btn-danger' id='edit'><i class='fa fa-close'></i>حذف</a>";
						  echo "</td>";
				echo "</tr>";
				}
				?>
			</table>

		</div>
	</div>	

 
<?php } elseif ($do == "Add") { ?>
	
		<h1 class="text-center">Add new Course</h1>

			<div class="container">
				<form class="form-horizontal" action="courses.php?do=Insert" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="course name">
						</div>
						<label class="col-sm-2 control-label">course name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="file" name="image" class="form-control">
						</div>
						<label class="col-sm-2 control-label">course Image</label>
					</div>


					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="price" class="form-control" autocomplete="off" placeholder="price">
						</div>
						<label class="col-sm-2 control-label">price</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<select class="form-control" name="location">
								<option value="0">....</option>
								<option value="1">online</option>
								<option value="2">offline</option>
							</select>
						</div>
						<label class="col-sm-2 control-label">location</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<select class="form-control" name="language">
								<option value="0">....</option>
								<option value="English">English</option>
								<option value="Arabic">Arabic</option>
							</select>
						</div>
						<label class="col-sm-2 control-label">language</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="hours" class="form-control" autocomplete="off" placeholder="hours">
						</div>
						<label class="col-sm-2 control-label">hours</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="intro" class="form-control" autocomplete="off" placeholder="intro">
						</div>
						<label class="col-sm-2 control-label">course intro</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<textarea class="form-control" name="intro_body" style="height: 120px;"></textarea>
						</div>
						<label class="col-sm-2 control-label">Intro Body</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="details" class="form-control" autocomplete="off" placeholder="details">
						</div>
						<label class="col-sm-2 control-label">details</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<textarea class="form-control" name="details_body" style="height: 120px;"></textarea>
						</div>
						<label class="col-sm-2 control-label">details Body</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<?php 
							$stmt = $con -> prepare("SELECT * FROM certifications"); 
							$stmt -> execute();
							$rows = $stmt -> fetchAll();
							foreach ($rows as $row) { ?>
							<div class="col-xs-6"><p><input type="checkbox" value="<?php echo $row['id']?>" name="course[]" style="float: right;margin-right: 120px;"><?php echo $row['name'];?><br></p></div>	
						<?php	}
							?>
						</div>
						<label class="col-sm-2 control-label">certifications</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="moderator" class="form-control" autocomplete="off" placeholder="moderator">
						</div>
						<label class="col-sm-2 control-label">moderator</label>
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

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	    $errors= array();
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];

	    $expensions= array("jpeg","jpg","png");
	      
	    if(empty($errors)==true){
	        move_uploaded_file($file_tmp,"courses/".$file_name);
	    }else{
	        print_r($errors);
	    }
		
		$name 		= $_POST['name'];
		$image 		= $file_name;
		$price 		= $_POST['price'];
		$location 	= $_POST['location'];
		$language 	= $_POST['language'];
		$hours 		= $_POST['hours'];
		$intro 		= $_POST['intro'];
		$body_intro = $_POST['intro_body'];
		$details  	= $_POST['details'];
		$body_details = $_POST['details_body'];
		$certifications = $_POST['course'];
		$cert 			= implode(", ", $certifications);
		$moderator 	= $_POST['moderator'];

		// foreach ($certifications as $certificate ) {
		// 	echo $certificate;
		// }

		$formErrors = array();

			if (empty($name)) {
				$formErrors [] = 'الاسم لايمكن ان يكون<strong> فارغ</strong>';
			}

			if (empty($price)) {
				$formErrors [] = 'الصوره لايمكن ان يكون<strong> فارغ</strong>';
			}

			if (empty($location)) {
				$formErrors [] = 'يجب أختيار<strong> نوع الكورس</strong>';
			}

			if (empty($language)) {
				$formErrors [] = 'يجب أختيار<strong> نوع الكورس</strong>';
			}

			if (empty($hours)) {
				$formErrors [] = 'يجب أختيار<strong> نوع الكورس</strong>';
			}

			if (empty($intro)) {
				$formErrors [] = 'يجب أختيار<strong> نوع الكورس</strong>';
			}

			if (empty($body_intro)) {
				$formErrors [] = 'يجب أختيار<strong> نوع الكورس</strong>';
			}

			if (empty($details)) {
				$formErrors [] = 'يجب أختيار<strong> نوع الكورس</strong>';
			}

			if (empty($body_details)) {
				$formErrors [] = 'يجب أختيار<strong> نوع الكورس</strong>';
			}

			if (empty($certifications)) {
				$formErrors [] = 'يجب أختيار<strong> نوع الكورس</strong>';
			}

			foreach ($formErrors as $error) {
				echo '<div class="alert alert-danger">'. $error  . '</div>' ;
			}


		$stmt = $con ->prepare("INSERT INTO courses(course_name,image,price,location,language,hours,intro,body_intro,details,body_details,certifications,lecturer) VALUES (:name,:image,:price,:location,:language,:hours,:intro,:body_intro,:details,:body_details,:certifications,:lecturer)");

		$stmt -> execute(array(
			"name"			=> $name,
			"image"			=> $file_name,
			"price"			=> $price,
			"location"		=> $location,
			"language"		=> $language,
			"hours"			=> $hours,
			"intro"			=> $intro,
			"body_intro"	=> $body_intro,
			"details"		=> $details,
			"body_details"	=> $body_details,
			"certifications"=> $cert,
			"lecturer"		=> $moderator
		));

		echo "<div class='alert alert-success'>You have add a new course</div>";
		echo "<a href='".$_SERVER['HTTP_REFERER']."' class='btn btn-danger'>Go Back</a>";

	}

} 

}

// start edit page

elseif ($do == "Edit")  { 

	$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

	$stmt = $con ->prepare("SELECT * FROM courses WHERE id =?");
	$stmt -> execute(array($itemid));
	$rows = $stmt->fetchAll();

	foreach ($rows as $row) {
		
	
		?>
	
				<h1 class="text-center">Update Course</h1>

			<div class="container">
				<form class="form-horizontal" action="courses.php?do=update" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" value="<?php echo $row['course_name'] ?>">
						</div>
						<label class="col-sm-2 control-label">course name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<img src="courses/<?php echo $row['image'];?>" class="img img-responsive" style="height: 300px; margin-bottom: 20px;">
							<input type="file" name="image" class="form-control">
							<input type="hidden" name="image_old" value="<?php echo $row['image'] ?>">
						</div> 
						<label class="col-sm-2 control-label">course image</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="price" class="form-control" value="<?php echo $row['price'] ?>">
						</div>
						<label class="col-sm-2 control-label">price</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<select class="form-control" name="location">
								<option value="0">....</option>
								<option value="1" <?php if ($row['location'] == 1) {
									echo "Selected";
								} ?> >online</option>
								<option value="2" <?php if ($row['location'] == 2) {
									echo "Selected";
								} ?> >offline</option>
							</select>
						</div>
						<label class="col-sm-2 control-label">location</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<select class="form-control" name="language">
								<option value="0">....</option>
								<option value="1" <?php if ($row['language'] == "English") {
									echo "Selected";
								} ?>>English</option>
								<option value="2" <?php if ($row['language'] == "Arabic") {
									echo "Selected";
								} ?>>Arabic</option>
							</select>
						</div>
						<label class="col-sm-2 control-label">language</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="hours" class="form-control" value="<?php echo $row['hours'] ?>">
						</div>
						<label class="col-sm-2 control-label">hours</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="intro" class="form-control" value="<?php echo $row['intro'] ?>">
						</div>
						<label class="col-sm-2 control-label">course intro</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<textarea class="form-control" name="intro_body" style="height: 120px;"> <?php echo $row['body_intro']; ?> </textarea>
						</div>
						<label class="col-sm-2 control-label">Intro Body</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="details" class="form-control" value="<?php echo $row['details'] ?>">
						</div>
						<label class="col-sm-2 control-label">details</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<textarea class="form-control" name="details_body" style="height: 120px;"> <?php echo $row['body_details']; ?> </textarea>
						</div>
						<label class="col-sm-2 control-label">details Body</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="certifications" class="form-control" value="<?php echo $row['certifications'] ?>">
						</div>
						<label class="col-sm-2 control-label">certifications</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="moderator" class="form-control" value="<?php echo $row['lecturer'] ?>">
						</div>
						<label class="col-sm-2 control-label">moderator</label>
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

		$img = "";
		$file_name = $_FILES['image']['name'];

		if (empty($file_name)) {
			$img = $_POST['image_old'];
		} else { 

		$errors= array();
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];

	    $expensions= array("jpeg","jpg","png");
	      
	    if(empty($errors)==true){
	        move_uploaded_file($file_tmp,"courses/".$file_name);
	        $img = $file_name;
	    }else{
	        print_r($errors);
	    }

	}


		
		$name 		= $_POST['name'];
		$image 		= $img;
		$ID 		= $_POST['id'];
		$price 		= $_POST['price'];
		$location 	= $_POST['location'];
		$language 	= $_POST['language'];
		$hours 		= $_POST['hours'];
		$intro 		= $_POST['intro'];
		$body_intro = $_POST['intro_body'];
		$details  	= $_POST['details'];
		$body_details = $_POST['details_body'];
		$certifications = $_POST['certifications'];
		$moderator 	= $_POST['moderator'];

		$stmt = $con ->prepare("UPDATE courses SET course_name=?,image = ?,price=?,location=?,language=?,hours=?,intro=?,body_intro=?,details=?,body_details=?,certifications=?,lecturer=? WHERE id = ?");

		$stmt -> execute(array($name,$image,$price,$location,$language,$hours,$intro,$body_intro,$details,$body_details,$certifications,$moderator,$ID
		));

		echo "<div class='alert alert-success'>You have Updated The course</div>";
		echo "<a href='courses.php' class='btn btn-danger'>Go Home</a>";


	} // isset $_POST['edit']
} elseif ($do == "Delete") {

		echo "<h1 class='text-center'>حذف اعلان</h1>";
		echo "<div class='container'>";

			$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

			$stmt = $con -> prepare ("SELECT * FROM courses WHERE id = ?");
			$stmt -> execute (array($itemid));
			$count = $stmt -> rowCount() ;

			if ($count > 0) {
					$stmt = $con -> prepare('DELETE FROM courses WHERE id = :item');
					$stmt -> bindparam(':item' , $itemid);
					$stmt -> execute();
					echo "<div class='alert alert-danger'>Deleted</div>";
					echo "<a href='courses.php' class='btn btn-danger'>Go Home</a>";
					
				}

		echo "</div>";
}  

} else {
	header("location:index.php");
}

 ?>



</body>
</html>	