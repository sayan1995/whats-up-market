 <html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="man.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<?php
	$servername = "localhost";
	$username = "root";
	$password = '';
	$db = "supermarket";
	
	$conn = new mysqli($servername, $username, $password, $db);
	
	if($conn->connect_error)
		die("Connection Failed:" . $conn->connect_error);
	
	//echo "connected sucessfully";
	//$conn->close();
?>
<body>
	<nav class="navbar navbar-default" >
		<div class="container-fluid" style="background-color:#030303;height:100px">
			<div class="navbar-header col-md-6 text-center">
				<h1 style="color:white; margin-top:30px">Welcome XYZ</h1>
			</div>
			<ul class="nav navbar-nav " style=" margin-left:250px;padding-top:30px;color:#e0e0e0">
				 
				
				<li><a href="Manager_Profile.php" style="color:white" >Profile</a></li>
				<li><a href="Manager_Portal.php" style="color:white">Portal</a></li>
				<li><a href="#"><i class="material-icons" style=" margin-right:10px;color:white">sms</i></a></li>
				<li><img src="pic.jpg" height="40px" width="50px" ></li>
				<li><a href="Manager_Signout.php" style="color:white" >Signout</a>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 text-center" style="left:-75px;margin-top:-21px;background-color:#e0e0e0;z-index:100;height:100%">
				<div class="list-group" style="margin-right:-15px;margin-left:2px">
					<a href="Manager_Employee_View.php" class="list-group-item active"><h4>Employee</h4></a>
					<a href="Manager_Customer_View.php" class="list-group-item"><h4>Customer</h4></a>
					<a href="#" class="list-group-item"><h4>Accounts</h4></a>
					<a href="Manager_Supply_ViewVendors.php" class="list-group-item"><h4>Supply</h4></a>
					<a href="#" class="list-group-item"><h4>Products</h4></a>
					<a href="#" class="list-group-item"><h4>Analysis</h4></a>
				</div>
			</div>
			<br/>
			<br/>
			
			<div class="col-md-9 text-center">
			<?php
				
				if($_POST['emp_id']!=""&&($_POST['emp_name'])!=""&& ($_POST['salary'])!=""&& ($_POST['contact'])!="")
				{
					$designation= "employee";
					$emp_id = $_POST['emp_id'];
					$emp_name = $_POST['emp_name'];
					$salary = intval($_POST['salary']);
					$contact = intval($_POST['contact']);
					$image = $_FILES['image']['tmp_name'];
            		$img = file_get_contents($image);

					$sql = "INSERT INTO employee VALUES ('".$emp_id."', '".$designation."', '".$emp_name."', ".$salary.", ".$contact.",?)";
					$stmt = mysqli_prepare($conn,$sql);
		            mysqli_stmt_bind_param($stmt,"s",$img);
		            mysqli_stmt_execute($stmt);
		         
		            $check = mysqli_stmt_affected_rows($stmt);
		            if($check==1)
		            {
		                $msg = 'Successfullly Uploaded';
		            }
		            else
		            {
		                $msg = 'Could not upload';
		            }

					/*$result = $conn->query($sql);
					if($result!="null")
						echo "The employee details have been added.";*/
				}
				else
				{
					echo "You have missed one or more fields. Please refill the details.";
				}
				
			 ?>
			 <br/>
			 <br/>
			 <a href="Manager_Employee_Add.php"> <img src="glyphicons-211-arrow-left.png" title='go back'/> </a>
			</div>
		</div>
	</div>
</body>
</html>
			
			
			
			