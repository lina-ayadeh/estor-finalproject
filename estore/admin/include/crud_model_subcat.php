<?php
if(isset($_GET['ide'])){
 $_SESSION['ide'] =$_GET['ide'];
   echo' 
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">SUBCATEGORY</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">DELET / EDITE SUBCATEGORY</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->';
              
               $quary ="SELECT * FROM sub_category WHERE sub_cat_id={$_SESSION['ide']}";
                                      $result=mysqli_query($database->conn,$quary);
                                    $cus=mysqli_fetch_assoc($result);
              echo'<form action="maneg_subcat.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname1" style="color:#2ba8e5"> Name</label>';
                   echo" <input type='text' name='fname' class='form-control' id='exampleInputname1' value='{$cus["sub_cat_name"]}'>";
                  echo'</div>';

                 /*  echo"<div class='form-group'>";
                  echo' <label for="cat1" style="color:#2ba8e5">category</label>';
                echo"  <select name='cid' id='cat1'>";
                                $quary ="SELECT * FROM category ";
                                      $result=mysqli_query($database->conn,$quary);
                                    while ($pro=mysqli_fetch_assoc($result)) {

                                  echo"  <option value='{$pro["cat_id"]}' >{$pro["cat_name"]}</option>";
 
                                 } 
                                echo" </select>";*/
                                echo" <div class='form-group'>
                                        <label for='cc-number' class='control-label mb-1' style='color:#2ba8e5'>subcaterory img</label>
                                        <input id='cc-number' name='imgsub' type='file' class='form-control cc-number identified visa'  data-val='true'
                                        data-val-required='Please enter the card number' data-val-cc-number='Please enter a valid card number'
                                        autocomplete='cc-number'>
                                        <span class='help-block' data-valmsg-for='cc-number' data-valmsg-replace='true'></span>
                                    </div>";
                    
                  echo'</div>'; 
                
               echo'</div>
                <!-- /.card-body -->
                <div class="row mb-2">
          <div class="col-sm-6">
                <div class="card-footer">
                  <button type="submit"  name="edite" class="btn btn-primary">edite</button>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="card-footer">
                  <button type="submit"  name="delete" class="btn btn-primary">delete</button>
                </div>
                </div>
                </div>
              </form>';
             
          echo ' </div>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>';
      
}
      ?>
 

  
<?php
   echo' <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">SUBCATEGORY</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD SUBCATEGORY</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->';
              
              echo'<form action="maneg_subcat.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
                <div class="card-body">
              

                  <div class="form-group">
                    <label for="exampleInputname1" style="color:#2ba8e5"> Name</label>';
                   echo" <input type='text' name='fname' class='form-control' id='exampleInputname1' >";
                  echo'</div>';

                  /* echo"<div class='form-group'>";
                    echo' <label for="cat2" style="color:#2ba8e5">category</label>';

                 echo" <select name='cid' id='cat2'>";
                                $quary ="SELECT * FROM category ";
                                      $result=mysqli_query($database->conn,$quary);
                                    while ($pro=mysqli_fetch_assoc($result)) {

                                  echo"  <option value='{$pro["cat_id"]}' >{$pro["cat_name"]}</option>";
 
                                 } 
                                echo" </select>";
                    
                  echo'</div>'; */
                  echo" <div class='form-group'>
                                        <label for='cc-number' class='control-label mb-1' style='color:#2ba8e5'>subcaterory img</label>
                                        <input id='cc-number' name='imgsub' type='file' class='form-control cc-number identified visa'  data-val='true'
                                        data-val-required='Please enter the card number' data-val-cc-number='Please enter a valid card number'
                                        autocomplete='cc-number'>
                                        <span class='help-block' data-valmsg-for='cc-number' data-valmsg-replace='true'></span>
                                    </div>";
                
                  
               echo' </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="add" class="btn btn-primary">add subcategory</button>
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