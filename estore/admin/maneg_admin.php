<?php


 include_once('include/admin_header.php');
include('include/oopadmin.php');


?>

<?php 
if(isset($_POST['add'])){

$image_name= $_FILES['imgadmin']['name'];
$tmp_name  =$_FILES['imgadmin']['tmp_name'];
$img_type  = $_FILES['imgadmin']['type'];


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
$pass =md5($_POST['password']);  
$email = $_POST['email']; 

 $database->create($fname, $pass, $email,$x);
}


if(isset($_POST['delete'])){
$id=$_SESSION['ide'];
$database->delet($id);	
}

if(isset($_POST['edite'])){


$image=$_FILES['imgadmin']['name'];
$tmp=$_FILES['imgadmin']['tmp_name'];
 $type = $_FILES['imgadmin']['type'];


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


$email=$_POST['email'];
$pass=md5($_POST['password']);
$fname=$_POST['fname'];
$id=$_SESSION['ide'];

 $database->update($fname, $pass, $email,$x,$id);

}


?>
<?php  include('include/add_delet_edit_model.php');
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
                <h3 class="card-title">MANEG_ADMIN</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ADMIN_ID</th>
                    <th>ADMIN_NAME</th>
                    <th>ADMIN_EMAIL</th>
                    <th>ADMIN_IMG</th>
                    <th>EDIT/DELETE</th>
                    


                  </tr>
                  </thead>
                  <tbody>

                <?php 
                   $quary="SELECT * FROM admin";
                    $result=mysqli_query($database->conn,$quary);
                    while($admin=mysqli_fetch_assoc($result)){
                                        
                  echo '<tr>';
                    echo "<td>{$admin['admin_id']}</td>";
                    echo "<td>{$admin['admin_name']}</td>";
                    echo "<td>{$admin['admin_email']}</td>";
                   echo "<td><img src='./../mainimg/{$admin["admin_img"]}'style='width:50px;height: 50px;'></td>";

                  echo " <td><button type='button' class='btn btn-info'   >
                  <a href='maneg_admin.php?ide={$admin['admin_id']}'>
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
                  ADD ADMIN
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