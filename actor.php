<?php
//session_start();

include 'cox.php';
 	$idm='';
 	$namem='';

 	$update=false;
 	$hide=false;
 	if(isset($_GET['re']))
 {
 	     $id=$_GET['re'];
	$query= "UPDATE emp SET active=0 WHERE id=$id";
	$stmt=$con->prepare($query);
	//$stmt->bind_param("i",$id);
	$stmt->execute() ;
 	
header('location:emx.php');

}
if(isset($_GET['edix']))
 {


// 	$name=$_POST['name'];

     $id=$_GET['edix'];
$sql = mysqli_query($con, "SELECT * FROM emp WHERE id=$id");
	while($row = mysqli_fetch_array($sql))
          {

          		$idm=$row['id'];
          		 $idx=$row['cat'];
          		 if($idx=="cooker")
          		 {          		           	$namem=6000;


          		 }
          		 else{
          		           	$namem=5000;
          		      }



           // $due = $row['due'];
          }
          

$sqlx = mysqli_query($con, "SELECT * FROM emp1 WHERE id=$id");
while($row = mysqli_fetch_array($sqlx))
     {
          		$c=$row['pay'];

if($c==0)
{
	$hide=true;
}
else
{
		$hide=false;


}

     }
	
 	  
 	$update=true;


// 	//header('location:indee.php');



 }
 
if(isset($_POST['action']))
{


	 foreach ($_POST as $key => $value)
    {
        if(preg_match("/[0-9]+_name/",$key)){
            if($value != ''){
            $key = strtok($key, '_');
            $value = htmlspecialchars($value);
            $sql = "UPDATE emp SET name = '$value' WHERE id = $key;";
            $con->query($sql);
            }
        }
        if(preg_match("/[0-9]+_oprice/",$key)){
            if($value != ''){
            $key = strtok($key, '_');
            $value = htmlspecialchars($value);
            $sql = "UPDATE emp SET pn = '$value' WHERE id = $key;";
            $con->query($sql);
            }
        }
        if(preg_match("/[0-9]+_oq/",$key)){
            if($value != ''){
            $key = strtok($key, '_');
            $value = htmlspecialchars($value);
            $sql = "UPDATE emp SET cat = '$value' WHERE id = $key;";
            $con->query($sql);
            }
        }
        if(preg_match("/[0-9]+_price/",$key)){
            $key = strtok($key, '_');
            $sql = "UPDATE emp SET address = $value WHERE id = $key;";
            $con->query($sql);
        }
        if(preg_match("/[0-9]+_oc/",$key)){
            $key = strtok($key, '_');
            $sql = "UPDATE items SET cat = '$value' WHERE id = $key;";
            $con->query($sql);
        }

        if(preg_match("/[0-9]+_hide/",$key)){
            if($_POST[$key] == 1){
            $key = strtok($key, '_');
            $sql = "UPDATE emp SET active = 0 WHERE id = $key;";
            $con->query($sql);
            } else{
            $key = strtok($key, '_');
            $sql = "UPDATE emp SET active = 1 WHERE id = $key;";
            $con->query($sql);          
            }
        }
    }
    header('location:emx.php');

}
if(isset($_POST['update']))
{
$ID=$_POST['ID'];

$am=$_POST['Quantityx'];

 if(empty($ID) || empty($am)){


  header('location:emx.php');

   
} 
else
{


	$sql = "INSERT INTO emp2(id,amount) VALUES ($ID,$am);";

if($con->query($sql)==true){
    //move_uploaded_file($_POST['image'],$upload);

$user_id =  $con->insert_id;


$s= "SELECT * FROM emp3 WHERE id=$ID";
	 $stm=$con->prepare($s);
  //$stmt->bind_param("i",$id);
  $stm->execute() ;
  $resulti=$stm->get_result();
$sql = "UPDATE emp1 SET pay=1 WHERE id=$ID;";
         $con->query($sql);

  if(mysqli_num_rows($resulti) == 0)
  {           date_default_timezone_set("Asia/dhaka");

  	$x=date("Y-m-d H:i:s");

	$sql = "INSERT INTO emp3(id,datee) VALUES ($ID,'$x');";
         $con->query($sql);

  }
  else
  {           date_default_timezone_set("Asia/dhaka");


  	  	$x=date("Y-m-d H:i:s");

	$sql = "UPDATE emp3 SET datee='$x' WHERE id=$ID;";
         $con->query($sql);



  }


}
}

header('location:emx.php');


}




?>