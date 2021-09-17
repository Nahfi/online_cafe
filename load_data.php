<?php  
 //load_data.php  
 $con = mysqli_connect("localhost", "root", "root", "food");  
 $output = '';  
 if(isset($_POST["brand_id"]))  
 {  
      if($_POST["brand_id"] != '')  
      {  
        
        
        $search =  $_POST["brand_id"];
  /*$query = "
  SELECT * FROM tbl_customer 
  WHERE CustomerName LIKE '%".$search."%'
  OR Address LIKE '%".$search."%' 
  OR City LIKE '%".$search."%' 
  OR PostalCode LIKE '%".$search."%' 
  OR Country LIKE '%".$search."%'
  ";*/
    $sql= "SELECT * FROM items WHERE cat like '%".$search."%' && deleted=0";

          // $sql = "SELECT * FROM items WHERE name = '".$_POST["brand_id"]."'"; 
$result = mysqli_query($con, $sql);
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
                                                <th>image</th>
                        <th>Availabe quantity</th>

                        <th>Item Price/Piece</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
$query = "
SELECT * FROM items WHERE cat like '%".$search."%' && deleted=0";


$result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result))
        {
echo '<tr><td>'.$row["name"].'</td>';

                          echo "<td>";?> <img src="<?= $row['photo'] ?>" width='40' >
 <?php echo "</td>";
 
                        echo '<td>'.$row["quantity"].'</td>';

            echo '<td>'.$row["price"].'</td>';

         echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_oq">Quantity</label>';

          echo '<input value="" id="'.$row["id"].'_oq" name="'.$row['id'].'_oq" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>'; 
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
          <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
                  required: true,

      <?php
      $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
      while($row = mysqli_fetch_array($result))
      {
        echo $row["quantity"].':{
        min: 0,
        max: 10
        },
        ';
      }
    echo '},';
    ?>
        messages: {
      <?php
      $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
      while($row = mysqli_fetch_array($result))
      {  
        echo $row["quantity"].':{
        min: "Minimum 0",
        max: "Maximum 10"
        },
        ';
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
                                                <th>image</th>

                        <th>Available quantity</th>

                        <th>Item Price/Piece</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
        while($row = mysqli_fetch_array($result))
        {
echo '<tr><td>'.$row["name"].'</td>';

                          echo "<td>";?> <img src="<?= $row['photo'] ?>" width='40' >
 <?php echo "</td>";
 
                        echo '<td>'.$row["quantity"].'</td>';

            echo '<td>'.$row["price"].'</td>';
        echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_oq">Quantity</label>';

          echo '<input value="" id="'.$row["id"].'_oq" name="'.$row['id'].'_oq" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>'; 
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
          <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
                  required: true,

      <?php
      $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
      while($row = mysqli_fetch_array($result))
      {
        echo $row["quantity"].':{
        min: 0,
        max: 10
        },
        ';
      }
    echo '},';
    ?>
        messages: {
      <?php
      $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
      while($row = mysqli_fetch_array($result))
      {  
        echo $row["quantity"].':{
        min: "Minimum 0",
        max: "Maximum 10"
        },
        ';
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


<?php




 } 
}

      
 ?>