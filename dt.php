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
<div class="container">
	<div class="row justify-content-center">
 
		<div class="col-md-6 mt-3 bg-info p-2 rounded">
			<h2 class="bg-light p-2 rounded text-center text-dark">
				ID:<?= $vid ; ?>
			</h2>
			<div class="text-center">
				
<img src="<?= $vphoto; ?>" width="300" class="img-thumbnail">
			</div>
				<h4 class="text-light"> Name:<?=$vname ; ?></h4>
				<h4 class="text-light">Quantity:<?= $vquantity ; ?> </h4>
				<h4 class="text-light">Price:<?= $vprice ; ?> </h4>
				<h4 class="text-light">Sell:<?= $vsell ; ?> </h4>

        <input type="button" name="out" class="btn btn-success btn-block" value="home"
       onclick= "location.href='home.php' " > 
 <?php 

if(isset($_POST['out']))
{
//echo "hi";
header('location : home.php');
}
?>

   </div>
 </div>

</div>
</body>
</html> 
<?php }
