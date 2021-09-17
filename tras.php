<?php
include 'includes/connect.php';

 
include 'lol.php';
 
  if($_SESSION['admin_sid']==session_id())
  {

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Food Menu</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
     <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  </style> 
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/materialize-logo.png" alt="logo"></a> <span class="logo-text">Logo</span></h1></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
               <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>

              
         <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $role;?></p>
        


                </div>
            </div>
            </li>
            <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i>Admin index</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
                <li><a href="all-orders.php">All Orders</a>
                                </li>
                <?php
                  $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
                  while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
                  }
                  ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                 <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Tickets</a>
                            <div class="collapsible-body">
                                <ul>
                <li><a href="all-tickets.php">All Tickets</a>
                                </li>
                <?php
                  $sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
                  while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
                  }
                  ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>     
            <li class="bold"><a href="users.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Users</a>
            </li> 
            <li class="bold"><a href="sad.php" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Food Items</a>

            </li> 
             <li class="bold"><a href="sell.php" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Sell Items</a>
              
            </li>   
            <li class="bold"><a href="duex.php" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Due</a>
              
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
       </aside>
       
         <li>
  <a href="loss.php" class="badge badge-success p-2">loss profit</a>


</li>
<br>
<li>
    <a href="graph.php" class="badge badge-success p-2">graph</a>



</li>
<li>
  <a href="all-orders.php" class="badge badge-success p-2">ONLINE TRASACTION</a>

  
</li>

 <form method="post" class="formValidate" id="formValidate1"  action="tras.php">
       

        <td><div class="input-field col s12 "><label for="search" class="">Search by id</label>


          <input id="m" name="search" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>
<?php   
 //load_data_select.php  
 $con = mysqli_connect("localhost", "root", "root", "food");  
 function fill_brand($con)  
 {  
      $output = '';  
      $sql = "SELECT DISTINCT datee  FROM track1";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["datee"].'">'.$row["datee"].'</option>';  
      }  
      return $output;  
 }  
?>


<select name="brand" id="brand">  
                          <option value="">Search by date</option>  
                          <?php echo fill_brand($con); ?>  
                     </select>
 
<select name="rand" id="brand">  
                          <option value="">Search by range</option>  
                          <?php echo fill_brand($con); ?>  
                     </select>

<button class="btn waves-effect waves-light right submit" type="submit" name="actionx" id="max" onclick="c();" >search
                                              <i class="mdi-editor-insert-invitation"></i> 
                    </button>
 
</form>









    
 </div>
  <br>
  
<?php


if(isset($_POST['actionx']))

{

    $name=$_POST['search'];
        $name1=$_POST['brand'];
                $name2=$_POST['rand'];

//echo $name2;
    if(empty($name) && empty($name1) && empty($name2) )
    {
  $p="SELECT * FROM `track1` ";  


    }
    else if(empty($name) && empty($name2) )
    {
        $p="SELECT * FROM `track1` WHERE datee='$name1'";


    }
        else if(empty($name1) && empty($name2) )

    
    {

        $p="SELECT * FROM `track1` WHERE sid=$name
"; 
    }
     else if(empty($name) )

    
    {

        $p="SELECT * FROM `track1` WHERE datee BETWEEN '$name1' AND '$name2'"; 
    }
      else 
    {
        $p="SELECT * FROM (SELECT * FROM `track1` WHERE datee BETWEEN '$name1' AND '$name2') AS x WHERE x.sid=$name
";


    }
    

    }
    else
    {

  $p="SELECT * FROM `track1` ";  

    }

  $stmt=$con->prepare($p);
  $stmt->execute();
  $red=$stmt->get_result();

         ?>


 <table class="table table-dark">
    <thead>
      <tr>
        <th>ID</th>
        <th>name</th>
        <th>product name</th>
                <th>quantity</th>
                <th>price</th>

        <th>date</th>

        

                
      </tr>
    </thead>
    <tbody>


       <?php
      while ($rw=$red->fetch_assoc()) {
        
        

       ?>
      <tr>
        <td><?= $rw['sid']; ?></td>
        <td><?= $rw['sname']; ?></td>
                <td><?= $rw['pname']; ?></td>
                <td><?= $rw['quantity']; ?></td>
                                <td><?= $rw['sell']; ?></td>

                <td><?= $rw['datee']; ?></td>

                <td>



          



                </td>




      </tr>
    <?php } ?>
     
      
    </tbody>
  </table>
 
   <br>
   


<li>
  <a href="eminfo.php" class="badge badge-success p-2">TOTAL TRASACTION</a>

  
</li>

 <?php


if(isset($_POST['actionx']))

{

    $name=$_POST['search'];
        $name1=$_POST['brand'];
                $name2=$_POST['rand'];

//echo $name2;
    if(empty($name) && empty($name1) && empty($name2) )
    {
  $q="SELECT * FROM `total` ";  


    }
    else if(empty($name) && empty($name2) )
    {
        $q="SELECT * FROM `total` WHERE datee='$name1'";


    }
        else if(empty($name1) && empty($name2) )

    
    {

        $q="SELECT * FROM `total` WHERE sid=$name
"; 
    }
    else if(empty($name) )

    
    {

        $q="SELECT * FROM `total` WHERE datee BETWEEN '$name1' AND '$name2'"; 
    }
    else 
    {
        $q="SELECT * FROM (SELECT * FROM `total` WHERE datee BETWEEN '$name1' AND '$name2') AS x WHERE x.sid=$name
";


    }
      

    }
    else
    {

  $q="SELECT * FROM `total` ";  

    }

  $stmt=$con->prepare($q);
  $stmt->execute();
  $rex=$stmt->get_result();

         ?>


 <table class="table table-dark">
    <thead>
      <tr>
        <th>ID</th>
        <th>name</th>
        <th>total</th>
                <th>pay</th>

        <th>date</th>

        

                
      </tr>
    </thead>
    <tbody>


       <?php
      while ($rwi=$rex->fetch_assoc()) {
        
        

       ?>
      <tr>
        <td><?= $rwi['sid']; ?></td>
        <td><?= $rwi['sname']; ?></td>
                <td><?= $rwi['total']; ?></td>
                <td><?= $rwi['pay']; ?></td>

                <td><?= $rwi['datee']; ?></td>

                <td>



          



                </td>




      </tr>
    <?php } ?>
     
      
    </tbody>
  </table>
 
   

       


<br>  
<footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span> <a class="grey-text text-lighten-4" href="#" target="_blank"></a> </span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">nafiz & rabbi</a></span>
        </div>
    </div>
  </footer>
   
            
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
     
  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
      <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
      <?php
      $result = mysqli_query($con, "SELECT * FROM items");
      while($row = mysqli_fetch_array($result))
      {
        echo $row["id"].'_name:{
        required: true,
        minlength: 5,
        maxlength: 20 
        },';
        echo $row["id"].'_price:{
        required: true, 
        min: 0
        },';        
      }
    echo '},';
    ?>
        messages: {
      <?php
      $result = mysqli_query($con, "SELECT * FROM items");
      while($row = mysqli_fetch_array($result))
      {  
        echo $row["id"].'_name:{
        required: "Ener item name",
        minlength: "Minimum length is 5 characters",
        maxlength: "Maximum length is 20 characters"
        },';
        echo $row["id"].'_price:{
        required: "Ener price of item",
        min: "Minimum item price is Rs. 0"
        },';  
        echo $row["oprice"].'_price:{
        required: "Ener orginal_price of item",
        min: "Minimum item orginal_price is Rs. 0"
        },';
        echo $row["quantity"].'_price:{
        required: "Ener quantity of item",
        min: "Minimum item quantity is Rs. 0"
        },';      
      }
    echo '},';
    ?>
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>
    
    <script type="text/javascript">
    $("#formValidate1").validate({
        rules: {
    name: {
        required: true,
        minlength: 5
      },
    price: {
        required: true,
        min: 0
      },
      Quantity: {
        required: true,
        min: 0
      },
      orginal: {
        required: true,
        min: 0
      },
      image: {
        required: true,
       // min: 0
      },
      cat: {
        required: true,
       // min: 0
              minlength: 5


      },
  },
        messages: {
    name: {
        required: "Enter item name",
        minlength: "Minimum length is 5 characters"
      },
     price: {
        required: "Enter item price",
        minlength: "Minimum item price is Rs.0"
      },
      Quantity: {
        required: "Enter item quantity",
        minlength: "Minimum item price is Rs.0"
      },
      orginal: {
        required: "Enter item orginal_Price",
        minlength: "Minimum item price is Rs.0"
      },
      name: {
        required: "Enter item Categories",
        minlength: "Minimum length is 4 characters"
      },
    
        
  },
    errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>
</body>

</html>
<?php
  }
  else
  {
    if($_SESSION['customer_sid']==session_id())
    {
      header("location:index.php");   
    }
    else{
      header("location:login.php");
    }
  }
?>