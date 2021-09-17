<?php
 include 'includes/connect.php';

 

 
  if($_SESSION['admin_sid']==session_id())
  {
    include 'action.php';
    ?>

<!DOCTYPE html>
<html>
<head>
  <title> crud</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Crud</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="#">lol</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">lol1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">lol2</a>
      </li>
    </ul>
    
  </div>
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
 
    <div class="col-md-10">

      <h3 class="text-center text-dark mt-2 ">Advanced CRUD For Cafe Management System
  </h3>
  <hr>
  <?php 
if(isset($_SESSION['response'])){




   ?>
<div class="alert alert-<?= $_SESSION['res_type'] ;?> alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?= $_SESSION['response']; ?>
</div>
 <?php } unset($_SESSION['response']);?>

    </div> 
  </div>
   <div class="row">
    <div class="col-md-4">
     <h3 class="text-center text-info">add record </h3>

<form action="indee.php" method="post"enctype="multipart/form-data">
  

  <div class="form-group">
  <?php
  /* 
$q="SELECT name from product"; 

$stmt=$conn->prepare($q);
$stmt->execute();
$result=$stmt->get_result();


    <select type="text" name="name" class="form-control"> 

<?php 
while ($rows=$result->fetch_assoc()) {
  # code...
  $m=$rows['name'];
  echo "<option value='$m'>$m</option>";
}



 ?>

  </select>

*/

   ?>

<input type="text" name="search_text" id="search_text" placeholder="Search by name" class="form-control" />
 </div>
 
<input type="hidden" name="id" value="<?= $idm; ?>">
 <div class="form-group">
  <input type="text" name="foodname" value="<?= $namem; ?>" class="form-control" placeholder="Enter item name"> 
 </div>

  
 <div class="form-group">
  <input type="text" name="Quantity" value="<?=$quantitym; ?>" class="form-control" placeholder="Enter Quantity"> 

 </div>


<div class="form-group">
  <input type="number" name="price" value="<?=$pricem; ?>" class="form-control" placeholder="Enter price"> 
 </div>
 
<div class="form-group">
  <input type="number" name="sell_price" value="<?=$sellm; ?>" class="form-control" placeholder="Enter sell price"> 
 </div>
<div class="form-group">
<input type="hidden" name="oldimage" value="<?=$photom; ?>">
  <input type="file" name="image" class="custom-file"> 
  <img src="<?= $photom ?>" width="120" class= "img-thumbnail">
 </div>
<div class="form-group">

     <?php  if($update== true){      ?>


<input type="submit" name="update" class="btn btn-success btn-block"value="update record"> 

<?php } else {  ?>

  <input type="submit" name="add" class="btn btn-primary btn-block"value="add record"> 

       <input type="submit" name="reset" class="btn btn-success btn-block" value="Refresh"> 
<input type="button" name="out" class="btn btn-success btn-block" value="home"
       onclick= "location.href='home.php' " > 
    <a href="home.php?logout='1'" style="color: red;">logout</a>
<?php } ?>
 </div>

</form>

<?php 
$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] ";
if(strpos($fullUrl,"signup=empty")==true)
{
  echo "provide all info plz";
}


 ?>


      </div>
      <div class="col-md-8">
        <?php 


if(isset($_POST['reset']))
{
 // $name=$_POST['name'];

  //$id=$_GET['delete'];
  $query= "SELECT * FROM items";
  $stmt=$con->prepare($query);
  // $stmt->bind_param("s",$name);
  $stmt->execute() ;
  $result=$stmt->get_result();
  //header('location:indee.php');

}
/*if(isset($_POST['Search']))
{
  $name=$_POST['name'];

  //$id=$_GET['delete'];
  $query= "SELECT * FROM product WHERE name like '%$name%'";
  $stmt=$conn->prepare($query);
  // $stmt->bind_param("s",$name);
  $stmt->execute() ;
  $result=$stmt->get_result();
  //header('location:indee.php');

}*/ else {
  $q="SELECT * from items"; 

  $stmt=$con->prepare($q);
  $stmt->execute();
  $result=$stmt->get_result();
}

         ?>

         <div id="result">
        

         
           <h3 class="text-center text-info">record present in the database </h3>
     <table class="table  table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>image</th>
        <th>name</th>
                <th>Quantity</th>
        <th>price</th>
        <th>sell</th>
                <th>action</th>


      </tr>
    </thead>
    <tbody>

      <?php
      while ($row=$result->fetch_assoc()) {
        
      
       ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><img src="<?= $row['photo']; ?>" width="25"></td>
        <td><?= $row['name']; ?></td>
                <td><?= $row['quantity']; ?></td>
                                <td><?= $row['oprice']; ?></td>
                <td><?= $row['price']; ?></td>
                <td>


      <a href="details.php?details=<?= $row['id'];?>" class="badge badge-primary p-2"> details</a>
<a href="action.php?delete=<?= $row['id'];?>" class="badge badge-danger p-2 "onclick="return confirm('do you wanna dlt this record');"> delete</a>
<a href="indee.php?edit=<?= $row['id'];?>" class="badge badge-success p-2"> edit</a>
 
                </td>




      </tr>
    <?php } ?>
      
    </tbody>
  </table>


     
     </div> 
   </div>
</div>


</body>
</html> 
<script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:".php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  }
  
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
});
</script>
<?php }