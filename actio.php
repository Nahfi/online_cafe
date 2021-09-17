<?php
//session_start();

include 'cox.php';
 	$idm='';
 	$namem='';

 	$update=false;
if(isset($_GET['edi']))
 {


// 	$name=$_POST['name'];

$id=$_GET['edi'];
 	$query= "SELECT uid,sum(due) as total, date FROM due1 GROUP by uid
HAVING uid=$id ";
	$stmt=$con->prepare($query);
	//$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$idm=$row['uid'];
 	 	$namem=$row['total'];
 	$update=true;

// 	//header('location:indee.php');



 }
 

if(isset($_POST['update']))
{
$ID=$_POST['ID'];

$am=$_POST['Quantityx'];

 if(empty($ID) || empty($am)){


  header('location:duex.php');

   
} 

$query= "SELECT * FROM due1 WHERE uid =$ID";
	$stmt=$con->prepare($query);
	//$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	$result=$stmt->get_result();
 	$row=$result->fetch_assoc();
 	$am1=$row['due'];
 

 $x=$am1-$am;
 $qury= "UPDATE  due1 SET  due=$x  WHERE uid=$ID";

$stmt=$con->prepare($qury);
//	$stmt->bind_param("ii",$x,$id);
	$stmt->execute() ;


	$query= "INSERT INTO duepay(sid,amount) VALUES ($ID,$am) ";
$stmt=$con->prepare($query);
//$stmt->bind_param("ss",$cid,$n);
$stmt->execute() ; 


header('location:duex.php');


}




?>