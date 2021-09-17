<?php
//session_start();

include 'cox.php';
	$update=false;

	$idm="";
 	 	$namem="";
 	$quantitym="";
 	$pricem="";
 	$sellm="";
   	$photom="";
   	if(isset($_POST['out']))
{
     session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
































 if(isset($_GET['details']))
{
$id=$_GET['details'];
 	$query= "SELECT * FROM items WHERE id = ?";
$stmt=$con->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute() ;
$result=$stmt->get_result();
 	$row=$result->fetch_assoc();

$vid=$row['id'];
 	 	$vname=$row['name'];
 	$vquantity=$row['quantity'];
 	$vprice=$row['oprice'];
 	$vsell=$row['price'];
   	$vphoto=$row['photo'];

}
   	
if(isset($_POST['add']))
{

 $name=$_POST['foodname'];
 $quantity=$_POST['Quantity'];
 	

 $price=$_POST['price'];
 $sell=$_POST['sell_price'];
 $photo=$_FILES['image']['name'];
$upload="uploads/".$photo;
if(empty($name) || empty($quantity) || empty($price) || empty($sell) || empty($photo)  ){
	header('location:indee.php? signup=empty');

   // echo 'This line is printed, because the $var1 is empty.';
}	
else

{$query= "INSERT INTO items(name,oprice,price,quantity,photo) VALUES (?,?,?,?,?) ";
$stmt=$con->prepare($query);
$stmt->bind_param("sssss",$name,$price, $sell,$quantity,$upload);
$stmt->execute() ;
move_uploaded_file($_FILES['image']['tmp_name'],$upload);
header('location:indee.php');
$_SESSION['response']="SUCCESSFULLY INSERTED TO THE DATABASE";
$_SESSION['res_type']="SUCCESS";

}
}
if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$query= "DELETE FROM items WHERE id=?";
$stmt=$con->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute() ;
header('location:indee.php');

}

 if(isset($_GET['edit']))
 {


// 	$name=$_POST['name'];

$id=$_GET['edit'];
 	$query= "SELECT * FROM items WHERE id = ?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$idm=$row['id'];
 	 	$namem=$row['name'];
 	$quantitym=$row['quantity'];
 	$pricem=$row['oprice'];
 	$sellm=$row['price'];
   	$photom=$row['photo'];
   	$update=true;

// 	//header('location:indee.php');



 }
 if(isset($_POST['update']))
 {
 	 $id=$_POST['id'];

  
 $name=$_POST['foodname'];
 $quantity=$_POST['Quantity'];
 	

 $price=$_POST['price'];
 $sell=$_POST['sell_price'];
 $oldimage=$_POST['oldimage'];

 //$newimage=$_FILES['image']['name'];

if(isset($_FILES['image']['name']) &&   ($_FILES['image']['name']!=""))
{
	 $newimage=$_FILES['image']['name'];
unlink($oldimage);
move_uploaded_file($_FILES['image']['tmp_name'] , $newimage);
}
else
{

	$newimage=$oldimage;

}

	$query= "UPDATE  items SET name=?,oprice =?,price=?, quantity=?,photo=? WHERE id=?";

$stmt=$con->prepare($query);
	$stmt->bind_param("sssssi",$name,$price,$sell,$quantity,$newimage,$id);
	$stmt->execute() ;
 	header('location:indee.php');

 }






  ?>
