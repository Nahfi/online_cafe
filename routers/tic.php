<?php





include '../includes/connect.php';



$username = htmlspecialchars($_POST['username']);

$ad = htmlspecialchars($_POST['name']);
//$password = htmlspecialchars($_POST['password']);
$phone = $_POST['phone'];
      //$photo = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  


//$mail = $_POST['mail'];
//$id = $_POST['ID'];



function number($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

$sql = "INSERT INTO emp (name,address, pn) VALUES ('$username','$ad',$phone);";

if($con->query($sql)==true){
    //move_uploaded_file($_POST['image'],$upload);

$user_id =  $con->insert_id;
$sql = "INSERT INTO emp1(id,pay) VALUES ($user_id,0)";
if($con->query($sql)==true){
   
}
}
header("location: ../duex.php");
?>