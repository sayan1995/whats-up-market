<?php 
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
 
//session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

$mid = $_COOKIE['id'];
$mname= "";
$sql = "select * from customer where C_ID ='".$mid."' ";
$result = $conn->query($sql);
 if($result->num_rows > 0)
    {
      
       while($row = $result->fetch_assoc() ){
          $mname = $row['Name'];
       }
    }
/*$qnt = $_SESSION["Quantity"]; //give appropriate names
$item = $_SESSION["ITEM"];		//give appropriate names*/

$present=0;
$sql = "SELECT quantity FROM stock WHERE i_id = '".$_GET["itemId"]."'";
$result = $conn->query($sql);							
if($result->num_rows > 0)
    {
       while($row = $result->fetch_assoc() ){
          $present = $row['quantity'];
       }
    }

if($_GET["value"] < $present)
	echo "yes";      // whatever functionality u want
else
	echo "no";
	
?>