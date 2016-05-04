<?php
session_start();
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
require_once("dbcontroller.php");
$db_handle = new DBController();
$nquantity=$_GET["quantity"];
	$c=0;
	
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_GET["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM items WHERE I_ID='" . $_GET["I_ID"] . "'");
			if(!empty($_SESSION["cart_item"])){
			foreach ($_SESSION["cart_item"] as $item){
			    if($item["I_ID"]==$productByCode[0]["I_ID"])
				$nquantity=$item["quantity"]+$_GET["quantity"];	
			    
			     }
		    }
			$itemArray = array($productByCode[0]["I_ID"]=>array('name'=>$productByCode[0]["Item_Name"], 'I_ID'=>$productByCode[0]["I_ID"], 'quantity'=>$nquantity, 'price'=>$productByCode[0]["Price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["I_ID"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						   
							if($productByCode[0]["I_ID"] == $k)
							{
							$_SESSION["cart_item"][$k]["quantity"] = $_GET["quantity"];}
							
					}
				} else {
					
					//if()
					//$_SESSION["cart_item"][$productByCode[0]["code"]]["quantity"]+=$_POST["quantity"];
					
					
					
					
				$c_id = $_COOKIE["id"];
				$sql1 = "SELECT * FROM `order` WHERE c_id = $c_id and status = 'cart'";
				$result1 = $conn->query($sql1);

				$o_id="";
				while($row = $result1->fetch_array())
				{
					$o_id=$row["o_id"];	
				}

				//use this o_id to insert values into order_details. sample query below
				
				$i_id=$_GET["I_ID"];
				$quantity = $nquantity;

				$sql2 = "SELECT * FROM `items` WHERE I_ID = '$i_id'";
				$result2 = $conn->query($sql2);
				
				
				while($row2 = $result2->fetch_array())
				{
					$price = $row2["Price"];
				}
							
							
				$sql4 = "SELECT * FROM order_details where o_id = '".$o_id."' and i_id = '".$i_id."'";
				$result4= $conn->query($sql4);
				
				if($result4->num_rows > 0)
				{
					
					
					$sql5 = "UPDATE order_details set quantity = $quantity where o_id = $o_id and i_id = '$i_id'";
					$result5= $conn->query($sql5);
					
				}				
				else
				{
				//$sql3="INSERT INTO `order_details`(`o_id`, `c_id`, `i_id`, `quantity`, `price`) VALUES ($o_id,$c_id,$i_id,$quantity,$price)";
				//$sql3 = "Insert into order_details values($o_id,$c_id,$i_id,$quantity,$price)";
				$sql3="INSERT INTO `order_details`(`o_id`, `c_id`, `i_id`, `quantity`, `price`) VALUES ($o_id,$c_id,'$i_id',$quantity,$price)";
				$result3= $conn->query($sql3);
				}
				
					
					
					
					
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
						
				}
			} else {
				
				$c_id = $_COOKIE["id"];
				$sql1 = "SELECT * FROM `order` WHERE c_id = $c_id and status = 'cart'";
				$result1 = $conn->query($sql1);

				$o_id="";
				while($row = $result1->fetch_array())
				{
					$o_id=$row["o_id"];	
				}

				//use this o_id to insert values into order_details. sample query below
				
				$i_id=$_GET["I_ID"];
				$quantity = $nquantity;

				$sql2 = "SELECT * FROM `items` WHERE I_ID = '$i_id'";
				$result2 = $conn->query($sql2);

				
				while($row2 = $result2->fetch_array())
				{
					$price = $row2["Price"];
				}

				

							
				//$sql3="INSERT INTO `order_details`(`o_id`, `c_id`, `i_id`, `quantity`, `price`) VALUES ($o_id,$c_id,$i_id,$quantity,$price)";
				//$sql3 = "Insert into order_details values($o_id,$c_id,$i_id,$quantity,$price)";
				$sql3="INSERT INTO `order_details`(`o_id`, `c_id`, `i_id`, `quantity`, `price`) VALUES ($o_id,$c_id,'$i_id',$quantity,$price)";
				$result3= $conn->query($sql3);
				
				
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
	
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["I_ID"] == $k)
					{
						unset($_SESSION["cart_item"][$k]);
						$c_id = $_COOKIE["id"];
						$i_id=$_GET["I_ID"];
						$sql1 = "SELECT * FROM `order` WHERE c_id = $c_id and status = 'cart'";
						$result1 = $conn->query($sql1);

						$o_id="";
						while($row = $result1->fetch_array())
						{
							$o_id=$row["o_id"];	
						}
						$sql7 = "DELETE FROM order_details where o_id = 1010 and i_id = '$i_id'";
						$result7 = $conn->query($sql7);		
					}				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		$c_id = $_COOKIE["id"];
		$sql1 = "SELECT * FROM order WHERE c_id = $c_id and status = 'cart'";
		$result1 = $conn->query($sql1);

		$o_id="";
		while($row = $result1->fetch_array())
		{
			$o_id=$row["o_id"];	
		}
		$sql6 = "DELETE FROM `order_details` WHERE o_id = 1010";
		$result6 = $conn->query($sql6);
	
		unset($_SESSION["cart_item"]);
	break;	

	
}
if(!empty($_SESSION["cart_item"]))
    {
	foreach ($_SESSION["cart_item"] as $item)
	{$c=$c+1;}
	}
	echo "Cart($c)";
}
?>