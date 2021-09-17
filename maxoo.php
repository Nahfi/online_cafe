<?php
//session_start();

include 'cox.php';





if(isset($_POST["query"]))
{ ?>

	 <div>
        <table id="data-table-admin" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>


                        <th>Name</th>
                                                <th>image</th>

                          <th>orginal Price</th>

                        <th>Item Price</th>
                        <th>Quantity</th>
                            <th>Categories </th>

                        <th>Available</th>
                      </tr>
                    </thead>

                    <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM items");
        while($row = mysqli_fetch_array($result))
        {


//echo "<td><img src='folder_name/".$row['image_name']."'></td>";

  

          echo '<tr><td><div class="input-field col s12"><label for="'.$row["id"].'_name">Name</label>';

          echo '<input value="'.$row["name"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';

echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_photo"></label>';

          echo '<input src="'.$row["photo"].'" style="width:150px;" id="'.$row["id"].'_photo" name="'.$row['id'].'_photo" type="image" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>'; 

echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_oprice">orginal_Price</label>';

          echo '<input value="'.$row["oprice"].'" id="'.$row["id"].'_oprice" name="'.$row['id'].'_oprice" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>'; 




          echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_price">Price</label>';

          echo '<input value="'.$row["price"].'" id="'.$row["id"].'_price" name="'.$row['id'].'_price" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';


echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_oq">Quantity</label>';

          echo '<input value="'.$row["quantity"].'" id="'.$row["id"].'_oq" name="'.$row['id'].'_oq" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>'; 


echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_cat">Categories</label>';

          echo '<input value="'.$row["cat"].'" id="'.$row["id"].'_cat" name="'.$row['id'].'_oc" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>'; 





          echo '<td>';
          if($row['deleted'] == 0){
            $text1 = 'selected';
            $text2 = '';
          }
          else{
            $text1 = '';
            $text2 = 'selected';            
          }
          echo '<select name="'.$row['id'].'_hide">
                      <option value="1"'.$text1.'>Available</option>
                      <option value="2"'.$text2.'>Not Available</option>
                    </select></td></tr>';
        }
        ?>
                    </tbody>
</table>
              </div>
        <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="acton">Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
      </form>


  

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
    
<?php    }

else
{

$query= "SELECT * FROM items where deleted=0 ";


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

              <th>Available Quantity</th>

                        



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





?>

