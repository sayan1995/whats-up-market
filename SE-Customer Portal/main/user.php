<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";
$mid="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
 
$mid = $_COOKIE['id'];
$mname= "";
$sql = "select * from customer where C_ID ='".$mid."' ";
$result = $conn->query($sql);
 if($result->num_rows > 0)
    {
       while($row = $result->fetch_assoc() )
	   {
          $mname = $row['Name'];
       }
    }

 
?>

<html>
<head><link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="jquery-2.2.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.css">
        <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
        <script src="../Semantic/semantic.js"></script>
        <script src="../Semantic/semantic.min.js"></script>  
		<link rel="stylesheet" type="text/css" href="../semantic1/semantic.min.css">
		<script src="../semantic1/semantic.min.js"></script>
        <script src="../Semantic/package.js">
		</script>
		<link href="style.css" type="text/css" rel="stylesheet" />
		<link href="../css/my.css" type="text/css" rel="stylesheet" />
		</head>
<style>
#card{
width:1100px;
left:90px;
height:800px;
}
#ad{
width:250px;
left:10px;
border:2px;
border-color:grey;
border-style: solid;
}
#mmenu{
top:-50px;

}
#ad2{
border:2px;
border-color:grey;
border-style: solid;
}
#ad1{
width:280px;
border:2px;
border-color:grey;
border-style: solid;
}
#cart{
left:-400px;
width:50px;
}
#search{
left:100px;
width:600px;
top:50px;
}
#s{
height:35px;
width:50px;
top:-10px;
}
#logo{
width:300px;
}
#myCarousel{
height:232px;
width:720px;
left:40px;
}
#hb{
left:-50px;

}
#l{
width:160px;
left:8px;
top:-32px;
height:40px;
background-color:grey;
}
#r{
width:160px;
left:20px;
top:-32px;
height:40px;
background-color:black;
}
#m{
width:160px;
left:20px;
top:-32px;
height:40px;
background-color:black;

}

 #mf{
 width:160px;
left:15px;
top:-32px;
height:40px;
background-color:black;

 }  
#umenu{
left:214px;
} 
#umenu,#umenu1,#umenu2,#umenu3#menu5{

height:35px;
}
#p1{
left:400px;
}
		body{
              background:url('bg2.png');
          
          }
</style>
<script>
function init() {
     // document.getElementById("cart").innerHTML = "s";
   
	   if (window.XMLHttpRequest) {
            // I_ID for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // I_ID for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("cart").innerHTML = xmlhttp.responseText;
            }
        };
		//v=document.getElementById("addc").value ;
        xmlhttp.open("GET","../cart/beginc.php",true);
        xmlhttp.send();
    
}
$('.ui.dropdown')
  .dropdown()
;</script>
<body>
<div class="ui inverted menu">
  <div class="item">
    Location:
  </div>
  <div class="item">
    Bangalore
  </div>
  <div class="item ">
    <img src="ph.png">08024567543</img>
  </div>
  <a class="item " href="../cart/fav2.php">
    <img src="images.png">Favourites</img></a>
  </a>
<div class="right menu">
    <div class="ui simple dropdown item">
      New User? <i class="dropdown icon"></i>
      <div class="menu">
        <a href="WhatIsWhatsUMarket.php" class="item">What is "what's Up market"</a>
        <a href="About Us1.php" class="item">About Us</a>
        <a href="Product quality.php" class="item">Product Quality</a>
      </div>
    </div>

<div class="item">
       <label>Welcome &nbsp <?php echo $mname;?></label>
    </div>
</div>
<div class="item">
        
		 <a href="../login/login.php"><div class="ui primary button">Sign Out</div></a>
    </div>
</div>

<div class="ui card" style="box-shadow: 10px 10px 5px #888888;" id = "card" >
<div class="ui grid container">
<div class="row">

<div class="three wide column">
    <div class="column">
<img src="logo.png" id="logo">
</div>
 
</div>
    <div class="column">
	
	<form class="navbar-form" role="search" action="../Cart/search1.php" method="POST">
	
    <div class="input-group add-on" id="search">
	
      <input type="text" class="form-control input-input-xxlarge" placeholder="Search" name="srch_term" id="srch_term"style="box-shadow: 0px 10px 5px #888888;" >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" id="s" ><i class="glyphicon glyphicon-search"></i></button>

	  </div>
	  
	         <div class="column">

	<a href="../cart/cart1.php" ><img src="cart.png" ><span id="cart">Cart(0)</span>
	</a>
	</div>
	  </div>
	  
	   </form>
	  </div>
	 
    
 

</div>

	
<div class="row">
<div class="three wide column">
<div class="ui secondary vertical menu" >
  <a class="active item" id="mmenu">
  <i class="dropdown icon"></i>
    Shops
  </a>
  <?php
	$sql = "select * from category ";
	$result = $conn->query($sql);
	if($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc() )
	   {

			$sql = "select * from subcategory where cat_id='".$row['Cat_ID']."'";
			$result2 = $conn->query($sql);
			
			echo  "<div class='ui simple dropdown item' id='mmenu' style='height:30px;'>"; 
			echo  "<i class='dropdown icon'></i>";	
			
			if($result2->num_rows <= 0) 
				echo "<a  href='../Cart/products.php?cat_id=".$row['Cat_ID']."' class='item' style='margin-top:-12px;'>".$row['cat_name']."</a>";
			else
				echo "<a class='item' style='margin-top:-12px;'>".$row['cat_name']."</a>";
			
			echo "<div class='menu'>";
			
			if($result2->num_rows > 0) 
				echo "<div class='header'>".$row['cat_name']."</div>";
			
			if($result2->num_rows > 0) 
			{
				while($row1 = $result2->fetch_assoc() )
				{
					  echo "<a  href='../Cart/products.php?subcat_id=".$row1['subcat_id']."'class='item' style='margin-top:-12px;' >".$row1['subcat_name']."</a>";	
				}
			}
			echo "</div>";
			echo "</div>";
	   }
	}
	?>
  </div>

</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="4.png" alt="Chania">
    </div>

    <div class="item">
      <img src="2.png" alt="Chania">
    </div>

    <div class="item">
      <img src="3.png" alt="Flower">
    </div>

    <div class="item">
      <img src="1.png" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
 
  <br>
  
  <div id="hb">
<div class="ui black basic labels" id="cb">
<a class="ui black pointing  label" id="l" data-slide-to="0" data-target="#myCarousel"><center>Offer1</center></a>
   
  </a>
<a class="ui black pointing  label" id="mf" data-slide-to="1" data-target="#myCarousel"><center>Offer2</center></a>
    
  </a>
 <a class="ui black pointing label" id="m" data-slide-to="2" data-target="#myCarousel"><center>Offer3</center></a>
    
  </a>
 <a class="ui black  pointing label" id="r" data-slide-to="3" data-target="#myCarousel"><center>Offer4</center></a>
 
  </a>
</div>
</div>
</div>
<div class="row" style="margin-left:190px; margin-top:-100px;">
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="ad.png" alt="Chania" id="ad">&nbsp &nbsp &nbsp &nbsp &nbsp
  <img src="ad1.png" alt="Chania" id="ad1">&nbsp &nbsp &nbsp &nbsp &nbsp
  <img src="ad3.png" alt="Chania" id="ad2">
</div>
  </div>
</div>
</div>

</body>
</html>