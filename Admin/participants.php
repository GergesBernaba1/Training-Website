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

<?php 

	if ( isset($_SESSION['admin']) ) {  

		$do = isset($_GET['do'])  ? $_GET['do']  : 'Manage' ; 

	include '../connect.php'; 
	include "temps/navbar.php";

	if ($do == "Manage") { 

	$stmt = $con -> prepare("SELECT * FROM participants");
	$stmt -> execute();
	$rows = $stmt -> fetchAll(); 

	?>


	<div class="container" id="main">
		<div class="row">	
			<div class="col-xs-12"><h1 class="text-center" style="margin-bottom: 30px">Participants Page</h1></div>
		

			<table class="table table-bordered main-table text-center">
				<tr>
					<td># ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Phone</td>
					<td>course</td>
					<td>Regestre Time</td>
					<td>certifications</td>
					<td>Control</td>
				</tr>

				<?php 
				foreach ($rows as $row) {
				echo "<tr>";
					echo "<td>".$row['id'] ."</td>";
					echo "<td>".$row['name'] ."</td>";
					echo "<td>".$row['email'] ."</td>";
					echo "<td>".$row['phone'] ."</td>";
					echo "<td>".$row['course'] ."</td>";
					echo "<td>".$row['R_time'] ."</td>";
					echo "<td>".$row['certification'] ."</td>";

					if ($row['certification'] == 0) {
						echo "<td>
						<a href='participants.php?do=Edit&itemid=". $row['id']."&cert=0'class='btn btn-success'  id='edit'><i class='fa fa-edit'></i>Certify</a>";
						echo "</td>";
					} elseif ($row['certification'] == 1) {
						echo "<td>
						<a href='participants.php?do=Edit&itemid=". $row['id']."&cert=1'class='btn btn-danger'  id='edit'><i class='fa fa-edit'></i>Delete Certify</a>";
						echo "</td>";
					}
					
				echo "</tr>";
				}
				?>
			</table>

		</div>
	</div>	


<?php } elseif ($do == "Edit") {

	$id = $_GET['itemid'];
	$cert = $_GET['cert'];

	if ($cert == 0) {
		
		$stmt = $con -> prepare("UPDATE participants SET certification = 1 WHERE id = ?");
		$stmt -> execute(array($id));
		$count = $stmt -> rowCount();

		if ($count > 0) {
			echo "<div class='container'>";
				echo "<div class='alert alert-success'>User Has Been certified</div>";
				echo "<a href='".$_SERVER['HTTP_REFERER']."' class='btn btn-primary'>Go Back</a>";
			echo "</div>";
		} else {
			echo "<div class='container'>";
				echo "<div class='alert alert-danger'>There Is some Problems Please Try Again</div>";
				echo "<a href='".$_SERVER['HTTP_REFERER']."' class='btn btn-primary'>Go Back</a>";
			echo "</div>";
		}

	} elseif ($cert == 1) {

		$stmt = $con -> prepare("UPDATE participants SET certification = 0 WHERE id = ?");
		$stmt -> execute(array($id));
		$count = $stmt -> rowCount();

		if ($count > 0) {
			echo "<div class='container'>";
				echo "<div class='alert alert-success'>User Has Been Uncertified</div>";
				echo "<a href='".$_SERVER['HTTP_REFERER']."' class='btn btn-primary'>Go Back</a>";
			echo "</div>";
		} else {
			echo "<div class='container'>";
				echo "<div class='alert alert-danger'>There Is some Problems Please Try Again</div>";
				echo "<a href='".$_SERVER['HTTP_REFERER']."' class='btn btn-primary'>Go Back</a>";
			echo "</div>";
		}

	}

} 

}  ?>	
