<?php





include '../includes/connect.php';




$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$phone = $_POST['phone'];
      //$photo = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  


$mail = $_POST['mail'];
$id = $_POST['ID'];



function number($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

$sql = "INSERT INTO users (name,uid, username, password,email,contact) VALUES ('$name','$id', '$username', '$password','$mail', $phone);";

if($con->query($sql)==true){
    //move_uploaded_file($_POST['image'],$upload);

$user_id =  $con->insert_id;
$sql = "INSERT INTO wallet(customer_id) VALUES ($user_id)";
if($con->query($sql)==true){
    $wallet_id =  $con->insert_id;
    $cc_number = number(16);
    $cvv_number = number(3);
    $sql = "INSERT INTO wallet_details(wallet_id, number, cvv) VALUES ($wallet_id, $cc_number, $cvv_number)";
    $con->query($sql);
}
}
header("location: ../login.php");
?>