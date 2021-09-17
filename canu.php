<?php
include '../includes/connect.php';
include '../includes/wallet.php';
$x='';
if(isset($_POST['action']))
{


$status = $_POST['status'];
$id = $_POST['id'];

//update 

$x=2;


//update


$sql = "UPDATE orders SET status='$status', deleted=1 WHERE id=$id;";
$con->query($sql);
$sql = mysqli_query($con, "SELECT * FROM orders where id=$id");
while($row1 = mysqli_fetch_array($sql)){
$total = $row1['total'];
}
if($_POST['payment_type'] == 'Wallet'){
	$balance = $balance+$total;
	$sql = "UPDATE wallet_details SET balance = $balance WHERE wallet_id = $wallet_id;";
	$con->query($sql);
}


//up


$result = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $id");
			while($row = mysqli_fetch_array($result))
			{
				$id = $row['item_id'];
				$q = $row['quantity'];
 

				$queryzz= "SELECT * FROM items WHERE id=$id ";
  $stmt=$con->prepare($queryzz);
 // $stmt->bind_param("i",$idms);
  $stmt->execute() ;
  $resultx=$stmt->get_result();
$rowxz=$resultx->fetch_assoc();
  $quantity=$rowxz['quantity'];
  
$quantitymx=$q+$quantity;
  
$qury= "UPDATE  items SET  quantity=? WHERE id=?";

$stmt=$con->prepare($qury);
  $stmt->bind_param("si",$quantitymx,$id);
  $stmt->execute() ;




			}

//up











header("location: ../orders.php");
}
?>