<?php
include('include/mainheader.php');
?>
<?php

if(isset($_POST['addtofavert'])|| isset($_GET['pid'])){
  $pid=$_GET['pid'];
 
 $query="SELECT * FROM product  WHERE pro_id=$pid";
                $result=mysqli_query($database->conn,$query);
                $row=mysqli_fetch_assoc($result);
$id=$row['pro_id'];
 $name=$row['pro_name'];
 $price=$row['pro_price'];
$img=$row['pro_img'];
$desc=$row['pro_desc'];
$i=0;
$query="SELECT * FROM  favert_details ";
                $result=mysqli_query($database->conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                  if($row["pro_id"]==$pid){
                    $i=1;
                  }
                }

 
  if($i==0){
 $sql="INSERT INTO  favert_details (pro_id,pro_name,pro_price,pro_desc,pro_img) values('$id','$name','$price','$desc','$img')";

mysqli_query($database->conn, $sql);}

}



if(isset($_GET['idd'])){
$query="DELETE FROM favert_details WHERE fav_id={$_GET['idd']}";
mysqli_query($database->conn,$query);
header('location:favert.php');

}



?>

  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/back3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>favert List</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product </th>
                <th scope="col">Price</th>
                <th scope="col">desc</th>
                <th scope="col">delet</th>
                <th scope="col">add to card</th>
              </tr>
            </thead>
            <tbody>
             <?php  $query="SELECT * FROM  favert_details ";
                $result=mysqli_query($database->conn,$query);
                while($row=mysqli_fetch_assoc($result)){

             echo' <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">';
                    echo"  <img src='mainimg/{$row["pro_img"]}' alt='' />";
                   echo' </div>
                    <div class="media-body">';
                     echo" <p>{$row['pro_name']}</p>";
                    echo'</div>
                  </div>
                </td>
                <td>';
                  echo"<h5>{$row['pro_price']}</h5>";
                echo'</td>
                
                <td>';
                  echo"<h5>{$row["pro_desc"]}</h5>";
               echo' </td>
               <td>';
                  echo"<button type='button'  name='delet' class='btn btn-danger' ><a  href='favert.php?idd={$row["fav_id"]}'>delete</a></button>";
               echo' </td>';
                echo" <td><form action='cart.php?pid={$row["pro_id"]}' method='post'>";
echo"<div class='add_to_cart'>
                  <button type='submit' class='btn_3' name='addtocardinfav'>add to card</a>
              </div>";
             echo"</form></td>";
              echo'</tr>';
             
}
            ?>
             
              
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="product_list.php?all=100">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

<?php include('include/mainfooter.php');?>