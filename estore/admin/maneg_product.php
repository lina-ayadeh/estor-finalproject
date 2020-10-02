<?php

 include_once('include/admin_header.php');
 include('include/ooppro.php');
?>
<?php
$block="";
if(isset($_GET['allow'])){
  $id=$_GET['allow'];
            $block="allow"; 
            $sql="UPDATE product SET block_allow='$block' where pro_id=$id";
mysqli_query($database->conn, $sql);
        } 
        if(isset($_GET['block'])){
  $id=$_GET['block'];
            $block="block"; 
            $sql="UPDATE product SET block_allow='$block' where pro_id=$id";
mysqli_query($database->conn, $sql);
        } 
        

if(isset($_POST['add'])){
	

$image_name= $_FILES['imgpro']['name'];
$tmp_name  =$_FILES['imgpro']['tmp_name'];
$img_type  = $_FILES['imgpro']['type'];


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
$desc = $_POST['desc'];  
$price = $_POST['price'];
$catid=$_POST['cid'];
$subid=$_POST['sid'];
$numpro=$_POST['numpro'];

 $database->createpro($catid,$subid,$fname,$price,$desc,$numpro,$x);
}


if(isset($_POST['delete'])){
$id=$_SESSION['ide'];
$database->deletpro($id);	
}

if(isset($_POST['edite'])){


$image=$_FILES['imgpro']['name'];
$tmp=$_FILES['imgpro']['tmp_name'];
 $type = $_FILES['imgpro']['type'];


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


$fname = $_POST['fname'];
$desc = $_POST['desc'];  
$price = $_POST['price'];
$catid=$_POST['cid'];;
$subid=$_POST['sid'];
$id=$_SESSION['ide'];
$numpro=$_POST['numpro'];



 $database->updatepro($catid,$subid,$fname,$price,$desc,$numpro,$x,$id);

}


?>
<?php  include('include/crud_model_pro.php');
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
                <h3 class="card-title">MANEG_PRODUCT</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>price</th>
                    <th>description</th>
                    
                    <th>IMG</th>
                    <th>CAT_ID</th>
                     <th>SUB_CAT_ID</th>
                      <th>number of product</th>
                     <th>BLOCK/ALLOW</th>
                    <th>EDIT/DELETE</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                <?php 
                   $quary="SELECT * FROM product";
                    $result=mysqli_query($database->conn,$quary);
                    while($cus=mysqli_fetch_assoc($result)){
                                        
                  echo '<tr>';
                    echo "<td>{$cus['pro_id']}</td>";
                    echo "<td>{$cus['pro_name']}</td>";
                     echo "<td>{$cus['pro_price']}</td>";
                      echo "<td>{$cus['pro_desc']}</td>";
                           echo "<td><img src='./../mainimg/{$cus["pro_img"]}'style='width:50px;height: 50px;'></td>";
                   
                                              $prd=$cus['pro_id'];
                                              $sql="SELECT cat_name FROM category INNER JOIN product ON category.cat_id=product.cat_id WHERE product.pro_id=$prd";

                                                $result1=mysqli_query($database->conn,$sql);

                                              $catname =mysqli_fetch_assoc($result1);

                                              echo "<td>{$catname['cat_name']}</td>";

                                               $prd=$cus['pro_id'];
                                              $sql="SELECT sub_cat_name FROM sub_category INNER JOIN product ON sub_category.sub_cat_id=product.sub_cat_id WHERE product.pro_id=$prd";

                                                $result1=mysqli_query($database->conn,$sql);

                                              $subcatname =mysqli_fetch_assoc($result1);

                                              echo "<td>{$subcatname['sub_cat_name']}</td>";
                                              echo "<td>{$cus['numpro']}</td>";
                                              
                                            echo"  <td>
                                                <button type='button' class='btn btn-info'   >
                  <a href='maneg_product.php?allow={$cus["pro_id"]}'>
                 ALLOW
                  </a>
                </button>
                           <button type='button' class='btn btn-info'   >
                  <a href='maneg_product.php?block={$cus["pro_id"]}'>
                 BLOCK
                  </a>
                </button>
<br> {$cus["block_allow"]} </td>";


 
                          
                  echo " <td><button type='button' class='btn btn-info'   >
                  <a href='maneg_product.php?ide={$cus['pro_id']}'>
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
                  ADD PRODUCT
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