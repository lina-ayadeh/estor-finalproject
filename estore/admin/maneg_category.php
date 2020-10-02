<?php

 include_once('include/admin_header.php');
 include('include/oopcat.php');
?>
<?php 
if(isset($_POST['add'])){

$image_name= $_FILES['imgcat']['name'];
$tmp_name  =$_FILES['imgcat']['tmp_name'];
$img_type  = $_FILES['imgcat']['type'];


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


 $database->createcat($fname,$x);
}


if(isset($_POST['delete'])){
$id=$_SESSION['ide'];
$database->deletcat($id);	
}

if(isset($_POST['edite'])){


$image=$_FILES['imgcat']['name'];
$tmp=$_FILES['imgcat']['tmp_name'];
 $type = $_FILES['imgcat']['type'];


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
$id=$_SESSION['ide'];

 $database->updatecat($fname,$x,$id);

}


?>
<?php  include('include/crud_model_cat.php');
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
                <h3 class="card-title">MANEG_CATEGORY</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IMG</th>
                    <th>EDIT/DELETE</th>
                    


                  </tr>
                  </thead>
                  <tbody>

                <?php 
                   $quary="SELECT * FROM category";
                    $result=mysqli_query($database->conn,$quary);
                    while($cus=mysqli_fetch_assoc($result)){
                                        
                  echo '<tr>';
                    echo "<td>{$cus['cat_id']}</td>";
                    echo "<td>{$cus['cat_name']}</td>";
                   echo "<td><img src='./../mainimg/{$cus["cat_img"]}'style='width:50px;height: 50px;'></td>";

                  echo " <td><button type='button' class='btn btn-info'   >
                  <a href='maneg_category.php?ide={$cus['cat_id']}'>
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
                  ADD CATEGORY
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