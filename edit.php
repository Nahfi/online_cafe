<?php

include 'cox.php';
if(isset($_POST['action']))
{

$up=false;

$status = $_POST['status'];
if($status=='Delivered')
{
$up=true;

}
$id = $_POST['id'];

$sql = "UPDATE orders SET status='$status' WHERE id=$id;";
$con->query($sql);

header("location: ../all-orders.php");
}
?>