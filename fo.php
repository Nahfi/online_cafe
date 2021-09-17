<footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2017 <a class="grey-text text-lighten-4" href="#" target="_blank">Students</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Students</a></span>
        </div>
    </div>
  </footer>
  <form class="formValidate" id="formValidate1" method="post" action="" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Add Item</h4>
              </div>
              <div>
<table>
                    <thead>
                      <tr>
                        <th data-field="id">Name</th>
                        <th data-field="name">Quantity</th>
                        <th data-field="sell">Sell Price</th>
                        <th data-field="price"> Price</th>

                        <th data-field="images"> images</th>

                      </tr>
                    </thead>

                    <tbody>
				<?php
					echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';

					echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';			





          echo '<td><div class="input-field col s12 "><label for="Quantity" class="">Quantity</label>';
          echo '<input id="Quantity" name="Quantity" type="text" data-error=".errorTxt03"><div class="errorTxt03"></div></td>';
		
					echo '<td><div class="input-field col s12 "><label for="price" class="">Price</label>';


					echo '<input id="price" name="price" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';

                 //  <input type="file" name="image" class="custom-file"> 




          




          echo '<td><div class="input-field col s12 "><label for="orginal" class="">Orginal_Price</label>';
          echo '<input id="orginal" name="orginal" type="text" data-error=".errorTxt04"><div class="errorTxt04"></div></td>';

 echo '<td><div class="input-field col s12 "><label for="img" class=""></label>';
         echo '<input id="img" name="img" type="text" data-error=".errorTxt05"><div class="errorTxt05"></div></td>';



					echo '<td></tr>';
				?>
                    </tbody>
</table>
             </div>
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>

			</form>		
