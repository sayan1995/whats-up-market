<?php
//session_start();
//if(isset($_SESSION['email']))
//{	echo '<script type="text/javascript">alert("This Email Id already exists! please enter a new email");</script>'; 
//}
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
              background:url('background.jpg');
              padding:50px;
          }
          #id{
          	width: 500px;
          }
        </style>
        <script>
    var username,password,confirm,email,strength;
        
        function init()
        {
            
            //strength = document.getElementById('strength');
            username=document.getElementById("fname");
		    username1=document.getElementById("lname");
			
            //password=document.getElementById("password");
           // confirm=document.getElementById("confirm");
            email=document.getElementById("email");
		
        }
        function validate() {

            if (username.value.length == 0) {
                alert("Please enter an username");
                return false;
            }
			//alert(username.value.length);
            if (username1.value.length == 0) {
                alert("Please enter an username");
                return false;
            }
            var p = /(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$)/;
            if (p.test(email.value)) {
                alert("Please enter a valid email");
                return false;

            }
            return true;
        }
       
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
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:40%">
      Let's Start!
    </div>
  </div>
<br>
  <div align = "center">
  <div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card">
              <div class="content">
                <div class="header">SignUp</div>
              </div>
              <div>
              <form action="reg2.php" method="post" onsubmit="return validate()">
              		<div class = "form-group">
		            <div class = "col-md-12"><input class = "form-control" type="text" id="fname" name="fname" placeholder="Enter First Name"></div></div>
		            <div class = "col-md-12"><input class = "form-control" type="text" id="lname" name="lname" placeholder="Enter Phone No"></div></div>
					<div class = "col-md-12"><input class = "form-control" type="email" id="email" name="email" placeholder="Enter Email id"></div>
		            <input type="hidden" name="title" value="Next">
		            <div align="center"> 
		            <div class = "col-md-12" align="center"><input class = "btn btn-raised btn-primary" type="submit" value="Next"></div>
		            </div>
		        </form>
		       </div>
    </div>
    </div>
  </body>
</html>