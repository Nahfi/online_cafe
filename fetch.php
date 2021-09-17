<?php
//session_start();

include 'cox.php';





if(isset($_POST["query"]))
{
	//$search =  $_POST["query"];
	/*$query = "
	SELECT * FROM tbl_customer 
	WHERE CustomerName LIKE '%".$search."%'
	OR Address LIKE '%".$search."%' 
	OR City LIKE '%".$search."%' 
	OR PostalCode LIKE '%".$search."%' 
	OR Country LIKE '%".$search."%'
	";*/
$search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "
 SELECT * FROM items 
 WHERE cat IN (".$search_text.") 
 ";

$result = mysqli_query($con, $query);




if(mysqli_num_rows($result) > 0){      ?>




 <div class="container">
          <p class="caption">Order your food here.</p>
          <div class="divider"></div>
      <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Order Food</h4>
              </div>
              <div>
                  <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Item Price/Piece</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
$query = "
 SELECT * FROM items 
 WHERE cat IN (".$search_text.") 
 ";


$result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result))
        {
          echo '<tr><td>'.$row["name"].'</td><td>'.$row["price"].'</td>';                      
          echo '<td><div class="input-field col s12"><label for='.$row["id"].' class="">Quantity</label>';
          echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>';
        }
        ?>
                    </tbody>
</table>
              </div>
        <div class="input-field col s12">
              <i class="mdi-editor-mode-edit prefix"></i>
              <textarea id="description" name="description" class="materialize-textarea"></textarea>
              <label for="description" class="">Any note(optional)</label>
        </div>
        <div>
        <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Order
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
      </form>
            <div class="divider"></div>
            
          </div>


<?php




 } 



}

else
{

$query= "SELECT * FROM items ";


$result = mysqli_query($con, $query);




if(mysqli_num_rows($result) > 0){      ?>


    <?php } ?>
      
  <div class="container">
          <p class="caption">Order your food here.</p>
          <div class="divider"></div>
      <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Order Food</h4>
              </div>
              <div>
                  <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Item Price/Piece</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
        while($row = mysqli_fetch_array($result))
        {
          echo '<tr><td>'.$row["name"].'</td><td>'.$row["price"].'</td>';                      
          echo '<td><div class="input-field col s12"><label for='.$row["id"].' class="">Quantity</label>';
          echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>';
        }
        ?>
                    </tbody>
</table>
              </div>
        <div class="input-field col s12">
              <i class="mdi-editor-mode-edit prefix"></i>
              <textarea id="description" name="description" class="materialize-textarea"></textarea>
              <label for="description" class="">Any note(optional)</label>
        </div>
        <div>
        <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Order
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
      </form>
            <div class="divider"></div>
            
          </div>


<?php




 } 





?>

