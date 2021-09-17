<?php
 include 'includes/connect.php';

 

 
  if($_SESSION['admin_sid']==session_id())
  {
    include 'actions.php';
    ?>


<!DOCTYPE html>
<html>
<head>
  <title> </title>
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

  <!-- Toggler/collapsibe Button -->
</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
 
    <div class="col-md-10">

      <h3 class="text-center text-dark mt-2 ">SELL PRODUCT  IN ONLINE
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
     <h3 class="text-center text-info">INFO </h3>

<form action="sell.php" method="post"enctype="multipart/form-data">
  

  <div class="form-group">
  <?php 
/*$q="SELECT name from product"; 

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
</select>
  

   ?>

*/



 ?>
  <input type="text" name="search_text" id="search_text" placeholder="Search by name" class="form-control" />
  <br>

  


 </div>

<input type="hidden" name="id" value="<?= $id; ?>">
 <div class="form-group">
  <input type="text" name="foodname" value="<?= $xname; ?>" class="form-control" placeholder="item name"> 





 </div>


 


  
 <div class="form-group">
  <input type="text" id="txt1"  onkeyup="sum();" name="Quantity" value="<?=$xquantity; ?>" class="form-control" placeholder="Quantity"> 

 </div>


<div class="form-group">
  <input type="number" id="txt2"  onkeyup="sum();" name="price" value="<?=$xsell; ?>" class="form-control" placeholder=" price"> 
 </div>
 
<div class="form-group">
  <input type="number" id="txt3" name="sell_price" value="<?=$xsell*$xquantity; ?>" class="form-control" placeholder="price*Quantity"> 
 </div>
<div class="form-group">
 </div>
<div class="form-group">
  

  <?php  
/*if(isset($_POST['refine']))
{ 

$n="";
$cid="";
$n=$_POST['cname'];
 $cid=$_POST['cid'];
 
  
  
$query= "SELECT sum(total) as tot FROM temp";
  $stmt=$conn->prepare($query);
  //$stmt->bind_param("i",$id);
  $stmt->execute() ;
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  $tot=$row['tot'];
  $query= "INSERT INTO temp1 (id,name,quantity,buyp,total,datee) SELECT id, name, quantity,buyp,total,datee FROM temp";
$stmt=$conn->prepare($query);
//$stmt->bind_param("i",$id);
$stmt->execute() ;


/*
$query= "SELECT * FROM temp";
  $stmt=$conn->prepare($query);
  //$stmt->bind_param("i",$id);
  $stmt->execute() ;
  $result=$stmt->get_result();


while ($rows=$result->fetch_assoc()) {
  # code...
  //$m=$rows['name'];
$quantitym=$rows['quantity'];
    $idm=$rows['id'];


$queryzz= "SELECT * FROM product WHERE id=$idm ";
  $stmt=$conn->prepare($queryzz);
 // $stmt->bind_param("i",$idms);
  $stmt->execute() ;
  $resultx=$stmt->get_result();
$rowxz=$resultx->fetch_assoc();
  $quantity=$rowxz['quantity'];
  
$quantitymx=$quantitym+$quantity;
  
$qury= "UPDATE  product SET  quantity=? WHERE id=?";

$stmt=$conn->prepare($qury);
  $stmt->bind_param("si",$quantitymx,$idm);
  $stmt->execute() ;

}
for order delete 
*/







  /*$query= "DELETE FROM temp ";
$stmt=$conn->prepare($query);
//$stmt->bind_param("i",$id);
$stmt->execute() ;


/*INSERT INTO temp1 (id,name,quantity,total) SELECT id, name, quantity,total FROM temp
*/
 
    //header('location:sell.php');







//$bi=true;

 
//}
?>


  <?php 

$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] ";
if(strpos($fullUrl,"signup=empty")==true)
{
  echo "ENTER VAlAId quantity";
}

  ?>
<?php 
$fullU="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] ";
if(strpos($fullU,"signu=empty")==true)
{
  echo "provide all info plz";
}



 ?>
 <?php 
$fullU="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] ";
if(strpos($fullU,"suu=empty")==true)
{
  echo "EMPTY TABLE";
}



 ?>
<?php
$query= "SELECT sum(total) as tot FROM temp";
  $stmt=$con->prepare($query);
  //$stmt->bind_param("i",$id);
  $stmt->execute() ;
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  $tot=$row['tot'];


$full="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] ";
if(strpos($full,"s=empty")==true)
{
  $query= "SELECT sum(total) as tot FROM temp";
  $stmt=$con->prepare($query);
  //$stmt->bind_param("i",$id);
  $stmt->execute() ;
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  $tot=$row['tot'];

  echo "please enter cname and cid";
}


 ?>



     <?php  if($update== true){      ?>


<input type="submit" name="update" class="btn btn-success btn-block"value="add to record"> 

<?php } else {  ?>



    <a href="home.php?logout='1'" style="color: red;">logout</a>
    

 


<?php } ?>
<br>
    <br>
    
 
<div class="form-group">
  <input type="text" name="foodnamex" value="<?= $xnamex; ?>" class="form-control" placeholder="item name"> 
 </div>



    <div class="form-group">
  <input type="number" name="Quantityx" value="<?=$xquantityx; ?>" class="form-control" placeholder="Quantity"> 



    <?php  if($updat== true){      ?>


<input type="submit" name="updatex" class="btn btn-success btn-block"value="update"> 

<?php } else {  ?>

  



    <input type="submit" name="refi" id="b" class="btn btn-primary btn-block" onclick="return confirm('do you finalize your total');"value="bill"> 


 


<?php } ?>
<input type="button" name="out" class="btn btn-success btn-block" value="home"
       onclick= "location.href='index.php' " > 
<div id="x" >
  <br>

  <label>name:</label>

<input type="text" name="cname" id="x"  onkeyup="hurt();"    placeholder=" " class="" />

<br>
    <label>ID:</label>

  <input type="text" name="cid" id="y"  onkeyup="hurt();" placeholder=" " class="" />

</div>

<input type="hidden" name="ni" value="<?php echo $name; ?>" placeholder=" " class="" />


 </div>

 </div>



      </div>
      <div class="col-md-8">

        <script type="text/javascript">
  
</script>
        <?php 



if(isset($_POST['Search']))
{
  $name=$_POST['name'];

  //$id=$_GET['delete'];
  $query= "SELECT * FROM product WHERE name like '%$name%'";
  $stmt=$conn->prepare($query);
  // $stmt->bind_param("s",$name);
  $stmt->execute() ;
  $result=$stmt->get_result();
  //header('location:indee.php');

} else {
  $q="SELECT * from items WHERE quantity!=0"; 

  $stmt=$con->prepare($q);
  $stmt->execute();
  $result=$stmt->get_result();
}


         ?>
         <script type="text/javascript">
           
                      var q= <?php echo $xquantity; ?>;

         </script>
         <div id="result">
     <h3 class="text-center text-info"> </h3>
     <table class="table  table-hover" id="table-data">
    <thead>
      <tr>
        <th>#</th>
        <th>image</th>
        <th>name</th>
                <th>Quantity</th>
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
                <td><?= $row['price']; ?></td>
                <td>


      <a href="dt.php?details=<?= $row['id'];?>" class="badge badge-primary p-2"> details</a>
<a href="sell.php?edit=<?= $row['id'];?>" class="badge badge-success p-2"> ADD</a>
 
                </td>




      </tr>
    <?php } ?>
      
    </tbody>
  </table>
</div>


<br>
<br>
<?php 



  $p="SELECT * from temp"; 

  $stmt=$con->prepare($p);
  $stmt->execute();
  $re=$stmt->get_result();


         ?>


 <table class="table table-dark">
    <thead>
      <tr>
        <th>#</th>
        <th>name</th>
        <th>quantity</th>
                <th>total</th>
                <th>action</th>

      </tr>
    </thead>
    <tbody>


       <?php
      while ($rw=$re->fetch_assoc()) {
        
      
       ?>
      <tr>
        <td><?= $rw['id']; ?></td>
        <td><?= $rw['name']; ?></td>
                <td><?= $rw['quantity']; ?></td>
                                <td><?= $rw['total']; ?></td>
                <td>


<a href="actions.php?delete=<?= $rw['id'];?>" class="badge badge-danger p-2 "onclick="return confirm('do you wanna dlt this record');"> delete</a>
<a href="sell.php?edi=<?= $rw['id'];?>" class="badge badge-success p-2"> edit</a>
 
                </td>




      </tr>
    <?php } ?>
     
      
    </tbody>
  </table>
  <script type="text/javascript">
    

    window.onload = function() {
            document.getElementById("button").style.display = 'none';
                        document.getElementById("b").style.display = 'none';
                        document.getElementById("x").style.display = 'none';
                       // document.getElementById("y").style.display = 'none';

        }
      
  </script>
  
 
  <label>Total :</label>
<input type="text" id="tx1" name='tot'  onkeyup="sumu();"  value="<?=$tot?>"  > 
 <label>Paid :</label>
<input type="text"  id="tx2" name='pd'  onkeyup="sumu();"> 

<label>change:</label>

<input type="text" id="tx3" name='cg' onkeyup="uid();"  >


<div id="button" >

  <label>Registration ID:</label>

  <input type="text"  id="ti1"  onkeyup="alex();" />

  
</div>
</from>
<br>
         
<br>
          <div id="resultx">

          </div>

      </div>
                  
   </div>
</div>

</body> 
</html> 

<script type="text/javascript">
   function sum() {


     var x11 = document.getElementById('txt1').value;
            var x22 = document.getElementById('txt2').value;
            var y11=parseInt(x11);
            var y22=parseInt(x22);

            var result= y22*y11;
           if(x11>q)
        
        {
          alert("enter valid quantity");
          
        }


            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
            }
           


            
        }
         function alex() {

            var c = document.getElementById('ti1').value;
            var d=parseInt(c);
           if (!isNaN(d)) {
alert(
"dm");
}



         }

       
        function sumu() {

            var x1 = document.getElementById('tx1').value;
            var x2 = document.getElementById('tx2').value;
            var y1=parseInt(x1);
            var y2=parseInt(x2);

            var result1 = y2 -y1;
            var i=0;
            if (!isNaN(result1)) {

                     enableButtoni();

               // document.getElementById('tx3').value = result1;
                 if(result1<0)
               {

              //  alert("v");
  var alerted = localStorage.getItem('alerted') || '';
    if (alerted != 'yes') {
     alert("My alert.");
     localStorage.setItem('alerted','yes');
    }

               
                enableButton();


              document.getElementById('tx3').value = result1;


               }
               else
               {

                                document.getElementById('tx3').value = result1;
                               // alert("v");

                              hideButton();




               }
              

               }
               else
               {

                              hideButtoni();


               }
                function enableButton() {
            document.getElementById("button").style.display = 'block';
           // document.getElementById("b").style.display = 'block';

        }
        function hideButton() {
            document.getElementById("button").style.display = 'none';
                        document.getElementById("b").style.display = 'none';

        }
         function enableButtoni() {
            document.getElementById("x").style.display = 'block';
           // document.getElementById("b").style.display = 'block';

        }
        function hideButtoni() {
            document.getElementById("x").style.display = 'none';
                        //document.getElementById("b").style.display = 'none';

        }


         


            
        }
        function uid() {
          var p1 = document.getElementById('tx3').value;

            var e1=parseInt(p1);
  if(!isNaN(e1))
               {
                enableButton();
               }
               else
               {
                              hideButton();


               }

          
          function enableButton() {
           // document.getElementById("button").style.display = 'block';
                        document.getElementById("x").style.display = 'block';

        }
        function hideButton() {
         //   document.getElementById("button").style.display = 'none';
                        document.getElementById("x").style.display = 'none';

        }


           }
        
        
 function hurt() {

            var p1 = document.getElementById('x').value;
            var p2 = document.getElementById('y').value;
            var e1=parseInt(p1);
            var e2=parseInt(p2);

          //  var result1 = e1 -e2;
          //  if (!isNaN(result1)) {


               // document.getElementById('tx3').value = result1;
                 if(isNaN(p1) && !isNaN(e2))
               {
                enableButton();
                //alert("v");

              //document.getElementById('tx3').value = result1;


               }
               else
               {

                                //document.getElementById('tx3').value = result1;
                               // alert("v");

                              hideButton();




               }
              

              // }
                function enableButton() {
           // document.getElementById("button").style.display = 'block';
                        document.getElementById("b").style.display = 'block';

        }
        function hideButton() {
         //   document.getElementById("button").style.display = 'none';
                        document.getElementById("b").style.display = 'none';

        }


         


            
        }
       
         


</script>

<script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:"lula.php",
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










