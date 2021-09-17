<?php
//session_start();

include 'cox.php';
$n="";
$cid="";




if(isset($_POST["query"]))
{
  $search =  $_POST["query"];
  /*$query = "
  SELECT * FROM tbl_customer 
  WHERE CustomerName LIKE '%".$search."%'
  OR Address LIKE '%".$search."%' 
  OR City LIKE '%".$search."%' 
  OR PostalCode LIKE '%".$search."%' 
  OR Country LIKE '%".$search."%'
  ";*/
    $query= "SELECT * FROM items WHERE name like '%".$search."%' and quantity!=0";


$result = mysqli_query($con, $query);




if(mysqli_num_rows($result) > 0){      ?>


  <h3 class="text-center text-info">record present in the database </h3>
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


      <a href="details.php?details=<?= $row['id'];?>" class="badge badge-primary p-2"> details</a>
<a href="sell.php?edit=<?= $row['id'];?>" class="badge badge-success p-2"> ADD</a>
 
                </td>




      </tr>
    <?php } ?>
      
    </tbody>
  </table>

<?php




 } 



}

else
{

$query= "SELECT * FROM items where quantity!=0 ";


$result = mysqli_query($con, $query);




if(mysqli_num_rows($result) > 0){      ?>


  <h3 class="text-center text-info">record present in the database </h3>
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


      <a href="details.php?details=<?= $row['id'];?>" class="badge badge-primary p-2"> details</a>
<a href="sell.php?edit=<?= $row['id'];?>" class="badge badge-success p-2"> ADD</a>
 
                </td>




      </tr>
    <?php } ?>
      
    </tbody>
  </table>

<?php




 } 




}
?>

