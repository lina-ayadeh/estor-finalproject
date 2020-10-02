<?php
 include_once('include/vendor_header.php');
 include('include/ooppro.php');

?>
<?php 
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
$id=$_SESSION['idvendor'];


 $database->createpro($catid,$subid,$id,$fname,$price,$desc,$numpro,$x);
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
             <?php if(isset($_SESSION['idvendor'])) {
               $quary="SELECT * FROM vendor WHERE vendor_id={$_SESSION['idvendor']}";
                    $result=mysqli_query($database->conn,$quary);
                    $cus=mysqli_fetch_assoc($result);
                    echo "<h2>{$cus['vendor_name']}</h2>";
    
}
?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>price</th>
                    <th>description</th>
                    <th>number of product</th>
                    <th>IMG</th>
                    <th>CAT_ID</th>
                     <th>SUB_CAT_ID</th>
                     <th>BLOCK/ALLOW</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                <?php
                
                   $quary="SELECT * FROM product WHERE vendor_id={$_SESSION['idvendor']}";

                    $result=mysqli_query($database->conn,$quary);
                    while($cus=mysqli_fetch_assoc($result)){
                                        
                  echo '<tr>';
                    echo "<td>{$cus['pro_id']}</td>";
                    echo "<td>{$cus['pro_name']}</td>";
                     echo "<td>{$cus['pro_price']}</td>";
                      echo "<td>{$cus['pro_desc']}</td>";
                          echo "<td>{$cus['numpro']}</td>";
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
                                               echo "<td>{$cus['block_allow']}</td>";        
                 
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




 <?php  include('include/vendor_footer.php')
  ?>