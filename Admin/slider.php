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

	$stmt = $con -> prepare("SELECT * FROM slider");
	$stmt ->execute();
	$courses = $stmt -> fetchAll();

	?>
	
	<div class="container" id="main">
		<div class="row">	
			<div class="col-xs-6"><h1 class="text-center">Slides Page</h1></div>
			<div class="col-xs-6" id="add"><a href="?do=Add" class="btn btn-primary btn-block">Add New Slide</a></div>
		

			<table class="table table-bordered main-table text-center">
				<tr>
					<td># ID</td>
					<td>image</td>
					<td>caption</td>
					<td>Control</td>
				</tr>

				<?php 
				foreach ($courses as $course) {
				echo "<tr>";
					echo "<td>".$course['id'] ."</td>";
					echo "<td>".$course['image'] ."</td>";
					echo "<td>".$course['caption'] ."</td>";
					echo "<td>
							<a href='slider.php?do=Edit&itemid=". $course['id']."'class='btn btn-success'  id='edit'><i class='fa fa-edit'></i>تعديل</a>
							<a href='slider.php?do=Delete&itemid=".$course['id']."'class='btn btn-danger' id='edit'><i class='fa fa-close'></i>حذف</a>";
						  echo "</td>";
				echo "</tr>";
				}
				?>
			</table>

		</div>
	</div>	

 
<?php } elseif ($do == "Add") { ?>
	
		<h1 class="text-center">Add new Slide</h1>

			<div class="container">
				<form class="form-horizontal" action="slider.php?do=Insert" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="file" name="image" class="form-control">
						</div>
						<label class="col-sm-2 control-label">Slide Image</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<textarea class="form-control" name="caption" style="height: 120px;"></textarea>
						</div>
						<label class="col-sm-2 control-label">Caption</label>
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

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	    $errors= array();
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];

	    $expensions= array("jpeg","jpg","png");
	      
	    if(empty($errors)==true){
	        move_uploaded_file($file_tmp,"slider/".$file_name);
	    }else{
	        print_r($errors);
	    }
		
		$caption 	= $_POST['caption'];
		$image 		= $file_name;

		$formErrors = array();

			if (empty($caption)) {
				$formErrors [] = 'caption لايمكن ان يكون<strong> فارغ</strong>';
			}

			foreach ($formErrors as $error) {
				echo '<div class="alert alert-danger">'. $error  . '</div>' ;
			}


		$stmt = $con ->prepare("INSERT INTO slider(image,caption) VALUES (:image,:caption)");
		$stmt -> execute(array(
			"image"			=> $file_name,
			"caption"		=> $caption
		));

		echo "<div class='alert alert-success'>You have add a new course</div>";
		echo "<a href='".$_SERVER['HTTP_REFERER']."' class='btn btn-danger'>Go Back</a>";

	}

} 

}

// start edit page

elseif ($do == "Edit")  { 

	$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

	$stmt = $con ->prepare("SELECT * FROM slider WHERE id =?");
	$stmt -> execute(array($itemid));
	$rows = $stmt->fetchAll();

	foreach ($rows as $row) {
		
	
		?>
	
			<h1 class="text-center">Update Slider</h1>

			<div class="container">
				<form class="form-horizontal" action="slider.php?do=update" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-sm-10">
							<img src="slider/<?php echo $row['image'];?>" class="img img-responsive" style="height: 300px; margin-bottom: 20px;">
							<input type="file" name="image" class="form-control">
							<input type="hidden" name="image_old" value="<?php echo $row['image'] ?>">
						</div> 
						<label class="col-sm-2 control-label">Slider image</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="caption" class="form-control" value="<?php echo $row['caption'] ?>">
						</div>
						<label class="col-sm-2 control-label">Caption</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="submit" name="edit" value="Add Now" class="btn btn-danger btn-block">
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
	        move_uploaded_file($file_tmp,"slider/".$file_name);
	        $img = $file_name;
	    }else{
	        print_r($errors);
	    }

	}


		
		$name 		= $_POST['caption'];
		$image 		= $img;
		$ID 		= $_POST['id'];

		$stmt = $con ->prepare("UPDATE slider SET image=?,caption = ? WHERE id = ?");
		$stmt -> execute(array($image,$name,$ID));

		echo "<div class='alert alert-success'>You have Updated The course</div>";
		echo "<a href='slider.php' class='btn btn-danger'>Go Home</a>";


	} // isset $_POST['edit']
} elseif ($do == "Delete") {

		echo "<h1 class='text-center'>حذف اعلان</h1>";
		echo "<div class='container'>";

			$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ?  intval($_GET['itemid']) : 0;

			$stmt = $con -> prepare ("SELECT * FROM slider WHERE id = ?");
			$stmt -> execute (array($itemid));
			$count = $stmt -> rowCount() ;

			if ($count > 0) {
					$stmt = $con -> prepare('DELETE FROM slider WHERE id = :item');
					$stmt -> bindparam(':item' , $itemid);
					$stmt -> execute();
					echo "<div class='alert alert-danger'>Deleted</div>";
					echo "<a href='slider.php' class='btn btn-danger'>Go Home</a>";
					
				}

		echo "</div>";
}  

} else {
	header("location:index.php");
}

 ?>



</body>
</html>	