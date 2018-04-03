<?php session_start(); ?>
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

	$stmt = $con -> prepare("SELECT * FROM certifications");
	$stmt ->execute();
	$certs = $stmt -> fetchAll();

	?>
	
	<div class="container" id="main">
		<div class="row">	
			<div class="col-xs-6"><h1 class="text-center">certifications Page</h1></div>
			<div class="col-xs-6" id="add"><a href="?do=Add" class="btn btn-primary btn-block">Add New certificate</a></div>
		

			<table class="table table-bordered main-table text-center">
				<tr>
					<td># ID</td>
					<td>Name</td>
					<td>image</td>
					<td>code</td>
					<td>Control</td>
				</tr>

				<?php 
				foreach ($certs as $cert) {
				echo "<tr>";
					echo "<td>".$cert['id'] ."</td>";
					echo "<td>".$cert['name'] ."</td>";
					echo "<td>".$cert['image'] ."</td>";
					echo "<td>".$cert['code'] ."</td>";
					echo "<td>
							<a href='certifications.php?do=Edit&itemid=". $cert['id']."'class='btn btn-success'  id='edit'><i class='fa fa-edit'></i>تعديل</a>
							<a href='certifications.php?do=Delete&itemid=".$cert['id']."'class='btn btn-danger' id='edit'><i class='fa fa-close'></i>حذف</a>";
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
				<form class="form-horizontal" action="certifications.php?do=Insert" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="certification name">
						</div>
						<label class="col-sm-2 control-label">certification name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="file" name="image" class="form-control">
						</div>
						<label class="col-sm-2 control-label">image</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="code" class="form-control" autocomplete="off" placeholder="code">
						</div>
						<label class="col-sm-2 control-label">code</label>
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
			    $file_name = $_FILES['image']['name'];
			    $file_size =$_FILES['image']['size'];
			    $file_tmp =$_FILES['image']['tmp_name'];
			    $file_type=$_FILES['image']['type'];

			    $expensions= array("jpeg","jpg","png");
			      
			    if(empty($errors)==true){
			        move_uploaded_file($file_tmp,"certifications/".$file_name);
			    }else{
			        print_r($errors);
			    }

				$name 			= $_POST['name'];
				$image 			= $file_name;
				$code 			=$_POST['code'];

				$formErrors = array();

					if (empty($name)) {
						$formErrors [] = 'الاسم لايمكن ان يكون<strong> فارغ</strong>';
					}

					if (empty($file_name)) {
						$formErrors [] = 'الصوره لايمكن ان يكون<strong> فارغ</strong>';
					}

					if (empty($code)) {
						$formErrors [] = 'يجب أختيار<strong> نوع الحجر</strong>';
					}

					foreach ($formErrors as $error) {
						echo '<div class="alert alert-danger">'. $error  . '</div>' ;
					}

					// check if there is no errors

					if (empty($formErrors)) {	
								
					$stmt = $con -> prepare ("INSERT INTO certifications(name , image,code) VALUES (:name , :image,:code)");
					$stmt -> execute(array(
						'name' 		=> 	$name,
						'image' 	=> 	$image,
						'code'		=>	$code 
							));
					echo "<div class='alert alert-success'>" .$stmt -> rowCount() . " اعلان تمت اضافته</div>";
					echo "<a href='certifications.php' class='btn btn-success'>Go Back</a>";		
				} 
			  }	
			echo "</div>";
}
} 

// start edit page

elseif ($do == "Edit")  { 

	$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

	$stmt = $con ->prepare("SELECT * FROM certifications WHERE id =?");
	$stmt -> execute(array($itemid));
	$rows = $stmt->fetchAll();

	foreach ($rows as $row) {
		
	
		?>
	
				<h1 class="text-center">Update certification</h1>

			<div class="container">
				<form class="form-horizontal" action="certifications.php?do=update"method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
						</div>
						<label class="col-sm-2 control-label">certification name</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="code" class="form-control" value="<?php echo $row['code']; ?>">
						</div>
						<label class="col-sm-2 control-label">code</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="submit" name="edit" value="Update Now" class="btn btn-danger btn-block">
						</div>
					</div>

					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

				</form>

			</div>

<?php }//end foreach 
} elseif ($do == "update")  {

	if (isset($_POST['edit'])) {
		
		echo "<h1 class='text-center'>Update</h1>";
		echo "<div class='container'>";

		$img = ''; 

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			    // $errors= array();
			    // $file_name = $_FILES['image']['name'];
			    // $file_size =$_FILES['image']['size'];
			    // $file_tmp =$_FILES['image']['tmp_name'];
			    // $file_type=$_FILES['image']['type'];

			    $expensions= array("jpeg","jpg","png");
			      
			    // if(empty($errors)==true){
			    //     move_uploaded_file($file_tmp,"certifications/".$file_name);
			    // }else{
			    //     print_r($errors);
			    // }

				$name 			= $_POST['name'];
				$id 			= $_POST['id'];
				$code 			=$_POST['code'];

				$formErrors = array();

					if (empty($name)) {
						$formErrors [] = 'الاسم لايمكن ان يكون<strong> فارغ</strong>';
					}

					if (empty($code)) {
						$formErrors [] = 'يجب أختيار<strong> نوع الحجر</strong>';
					}

					foreach ($formErrors as $error) {
						echo '<div class="alert alert-danger">'. $error  . '</div>' ;
					}

					// check if there is no errors

					if (empty($formErrors)) {	
								
					$stmt = $con -> prepare ("UPDATE certifications SET name=? ,code=? WHERE id = ?");
					$stmt -> execute(array($name,$code,$id));
					echo "<div class='alert alert-success'>" .$stmt -> rowCount() . " اعلان تمت اضافته</div>";
					echo "<a href='certifications.php' class='btn btn-success'>Go Back</a>";		
				} 
			  }	
			echo "</div>";
} 

} elseif ($do == "Delete") {

		echo "<h1 class='text-center'>حذف اعلان</h1>";
		echo "<div class='container'>";

			$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

			$stmt = $con -> prepare ("SELECT * FROM certifications WHERE id = ?");
			$stmt -> execute (array($itemid));
			$count = $stmt -> rowCount() ;

			if ($count > 0) {
					$stmt = $con -> prepare('DELETE FROM certifications WHERE id = :item');
					$stmt -> bindparam(':item' , $itemid);
					$stmt -> execute();
					echo "<div class='alert alert-danger'>Deleted</div>";
					echo "<a href='certifications.php' class='btn btn-danger'>Go Home</a>";
					
				}

		echo "</div>";
} 


} else {
	header("location:index.php");
}




 ?>



</body>
</html>	