<?php

 include_once('include/admin_header.php');
 include('include/oopsubcat.php');
?>
<?php 
if(isset($_POST['add'])){
$image_name= $_FILES['imgsub']['name'];
$tmp_name  =$_FILES['imgsub']['tmp_name'];
$img_type  = $_FILES['imgsub']['type'];


 $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

 if(in_array($img_type, $allowed_type)) {
        $path = './../mainimg/'; //change this to your liking
    } else {
        $error[] = 'File type not allowed';
    }

//move file to img foulder
$x=time().$image_name;
move_uploaded_file($tmp_name,$path.$x);
$fname = $_POST['fname'];
//$catid=$_POST['cid'];
 $database->createsub($fname,$x);
}


if(isset($_POST['delete'])){
$id=$_SESSION['ide'];
$database->deletsub($id);	
}

if(isset($_POST['edite'])){
$image=$_FILES['imgsub']['name'];
$tmp=$_FILES['imgsub']['tmp_name'];
 $type = $_FILES['imgsub']['type'];


 $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

 if(in_array($type, $allowed_type)) {
        $path = './../mainimg/'; //change this to your liking
    } else {
        $error[] = 'File type not allowed';
    }

//$path='admin/images/';
//move file to img foulder
$x=time().$image;
move_uploaded_file($tmp,$path.$x);


$fname=$_POST['fname'];
//$catid=$_POST['cid'];
$id=$_SESSION['ide'];

 $database->updatesub($fname,$x,$id);

}


?>
<?php  include('include/crud_model_subcat.php');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">MANEG_SUBCATEGORY</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>sub_img</th>
                    <th>EDIT/DELETE</th>
                    


                  </tr>
                  </thead>
                  <tbody>

                <?php 
                   $quary="SELECT * FROM sub_category";
                    $result=mysqli_query($database->conn,$quary);
                    while($cus=mysqli_fetch_assoc($result)){
                                        
                  echo '<tr>';
                    echo "<td>{$cus['sub_cat_id']}</td>";
                    echo "<td>{$cus['sub_cat_name']}</td>";
/* $prd=$cus['sub_cat_id'];
                                              $sql="SELECT cat_name FROM category INNER JOIN sub_category ON category.cat_id=sub_category.cat_id WHERE sub_category.sub_cat_id=$prd";

                                                $result1=mysqli_query($database->conn,$sql);

                                              $catname =mysqli_fetch_assoc($result1);

                                              echo "<td>{$catname['cat_name']}</td>";*/
                                              echo "<td><img src='./../mainimg/{$cus["sub_img"]}'style='width:50px;height: 50px;'></td>";

                  echo " <td><button type='button' class='btn btn-info'   >
                  <a href='maneg_subcat.php?ide={$cus['sub_cat_id']}'>
                  edite/delete
                  </a>
                </button></td>";
                 
                echo "</tr>";
            }

                    ?>

                 
                  </tbody>
                 
                </table>
                <br><br>
                 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                  ADD SUBCATEGORY
                </button>
              </div>
              <!-- /.card-body -->
            </div>
           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>




 <?php  include_once('include/admin_footer.php')
  ?>