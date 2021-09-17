<?php
include '../includes/connect.php';
include '../includes/wallet.php';
$x='';
if(isset($_POST['action']))
{


$status = $_POST['status'];
$id = $_POST['id'];

$cid = $_POST['user_id'];


//fine

$resultz = mysqli_query($con, "SELECT * FROM orders WHERE id = $id");
while($row = mysqli_fetch_array($resultz))
			{
				$st = $row['status'];
				$fi = $row['total'];

				if($st=="ready")
 {
/*
$razu = mysqli_query($con, "SELECT * FROM fi WHERE cid = $cid");


   if(mysqli_num_rows($razu) == 0)
   {
   	$fi=$fi*0.1;

$sql = "INSERT INTO fi (cid, tk) VALUES ($cid, $fi)";
$con->query($sql);
   }
   else
   {
$ruin = mysqli_query($con, "SELECT * FROM fi WHERE cid = $cid");
while($row = mysqli_fetch_array($ruin))
			{
				$lol = $row['tk'];
			}
$lol=$lol+($fi*0.1);
$sql = "UPDATE fi SET tk=$lol  WHERE cid=$cid;";
$con->query($sql);

}
*/




				}
			}



//

//update 





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