<?php
session_start();
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";
$mid="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$sql="INSERT INTO `customer` VALUES()
echo $_SESSION['username'].$_SESSION['email'].$_SESSION['ph'];
//$sql ="INSERT INTO customer VALUES('".$_SESSION['username']."','".$_SESSION['email']."',".$_SESSION['ph'].");";
$sql ="INSERT INTO customer VALUES('shash','shash@mail.com',8762599445)";
//$sql ="SELECT * FROM `customer` WHERE email_id='"+$_SESSION['email']+"';";
$result = $conn->query($sql);
echo $result;
 

//$check= $db_handle->runQuery($s);
/*if(!$check="")
{   
unset($_SESSION["username"]);
header('location:reg2.php');
}*/
?>
<html>
  <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="jquery-1.12.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
        <script src="../Semantic/semantic.js"></script>
        <script src="../Semantic/semantic.min.js"></script>                
        <script src="../Semantic/package.js"></script></head>
        <style>
          body{
             
              padding:50px;
          }
          #id{
          	width: 500px;
          }
        </style>
        <script>
   
    </script>

  </head>
  <body id="b" onload="init()">  
    <nav class="navbar navbar-default">
     <div class="container-fluid">
     
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
  <a class="navbar-brand" href="../main/main.html">What's Up Market!</a>
      
      </div>

     
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form id="signin" class="navbar-form navbar-right" role="form" action = "" method = "post">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="email" class="form-control" name="username" value="" placeholder="Username">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-raised btn-default">Login</button>
          <input type="hidden" name="title" value="LOGIN">
        </form>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
	<div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
      Done!
    </div>
  </div>
<br>
  <div align = "center">
  <div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card">
              <div class="content">
                <div class="header">SignUp</div>
              </div>
              <div>
				<form action="login.php" method="post" onsubmit="">
		            <div align="center"> 
					<p>Registration Done! Please Login!</p>
					<br>
		            <div class = "col-md-12" align="center"><input class = "btn btn-raised btn-primary" type="submit" value="Login"></div>
		            </div>
		        </form>
		       </div>
    </div>
    </div>
  </body>
</html>