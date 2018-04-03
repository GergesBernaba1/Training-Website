<?php  session_start(); 
	
	if ( isset($_SESSION['admin']) ) {  
	
	if (isset($_POST['name']) && empty($_POST['say']) === false ) {

		include '../connect.php';

		$name = $_POST['name'];
		$opinion = $_POST['say'];

		$stmt = $con -> prepare("INSERT INTO opinions (name , opinion) Values (:name,:opinion)");
		$stmt -> execute(array(
			"name"		=> $name,
			"opinion"	=> $opinion
		));
		$count = $stmt -> rowCount();

		if ($count > 0) {
			echo "<div class='alert alert-success'>Done</div>";
		} else {
			echo "<div class='alert alert-danger'>Failed</div>";
		}
	die();}


?>
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
	if (isset($_SESSION['admin'])) {
		
		include 'temps/navbar.php'; ?>

			<h1 class="text-center">Add new Opinion</h1>

			<div class="container">
				<form class="form-horizontal" action="#" method="POST">

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="اسم صاحب الارأي" id="owner">
						</div>
						<label class="col-sm-2 control-label">صاحب الرأي</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="الرأي" id="opinion">
						</div>
						<label class="col-sm-2 control-label">الرأي</label>
					</div>

					<div class="form-group">
						<div class="col-sm-10">
							<input type="submit" name="submit" value="Add Now" class="btn btn-danger btn-block" onclick="send()">
						</div>
					</div>

				</form>
			</div>

			<div id="state"></div>



	<?php } else{ 
		header('location:index.php');
	} 

?>


<script type="text/javascript">
	
	function send(){
		
		var owner = $("#owner").val();
		var opinion = $("#opinion").val();

		if ($.trim(opinion) != '' ) {

			$.ajax({ method:"post" ,  url:"opinions.php",data:{name : owner , say : opinion} , success: function(data) { $("#state").text(data); }  
		})
		}


 	}
</script>

<?php } else {
	header('location:index.php');
} ?>

</body>
</html>	