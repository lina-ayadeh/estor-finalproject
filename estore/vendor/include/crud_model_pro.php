  
<?php
   echo' <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">PRODUCT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD PRODUCT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->';
              
              echo'<form action="maneg_product.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputname1" style="color:#2ba8e5"> Name</label>';
                   echo" <input type='text' name='fname' class='form-control' id='exampleInputname1' >";
                  echo'</div>';
                 echo' <div class="form-group">
                    <label for="exampleInputPassword1" style="color:#2ba8e5"> description</label>';
                   echo" <input type='text' name='desc' class='form-control' id='exampleInputPassword1' >";
                  echo'</div>

                  <div class="form-group">
                    <label for="exampleInputPassword1" style="color:#2ba8e5">price</label>';
                   echo" <input type='text' name='price' class='form-control' id='exampleInputPassword1'>";
                  echo'</div>';
                   echo'<div class="form-group">
                    <label for="exampleInputpro1" style="color:#2ba8e5"> number of product</label>';
                   echo" <input type='number' name='numpro' class='form-control' id='exampleInputPro1' >";
                  echo'</div>';

                  echo"<div class='form-group'>";
                   echo'<label for="cat4" style="color:#2ba8e5">category</label>';
                 echo" <select name='cid' id='cat4'>";
                                $quary ="SELECT * FROM category ";
                                      $result=mysqli_query($database->conn,$quary);
                                    while ($pro=mysqli_fetch_assoc($result)) {

                                  echo"  <option value='{$pro["cat_id"]}' >{$pro["cat_name"]}</option>";
 
                                 } 
                                echo" </select>";
                    
                  echo'</div>';

                   echo"<div class='form-group'>";
                    echo'<label for="cat3" style="color:#2ba8e5">sub_category</label>';
                  echo"<select name='sid' id='cat3'>";
                                $quary ="SELECT * FROM sub_category ";
                                      $result=mysqli_query($database->conn,$quary);
                                    while ($pro=mysqli_fetch_assoc($result)) {

                                  echo"  <option value='{$pro["sub_cat_id"]}' >{$pro["sub_cat_name"]}</option>";
 
                                 } 
                                echo" </select>";
                    
                  echo'</div>'; 

                 echo" <div class='form-group'>
                                        <label for='cc-number' class='control-label mb-1' style='color:#2ba8e5'>product img</label>
                                        <input id='cc-number' name='imgpro' type='file' class='form-control cc-number identified visa'  data-val='true'
                                        data-val-required='Please enter the card number' data-val-cc-number='Please enter a valid card number'
                                        autocomplete='cc-number'>
                                        <span class='help-block' data-valmsg-for='cc-number' data-valmsg-replace='true'></span>
                                    </div>";

                  
               echo' </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="add" class="btn btn-primary">add product</button>
                </div>
                
              </form>';
             
          echo ' </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>';
      

      ?>