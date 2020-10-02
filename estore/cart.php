<?php
include('include/mainheader.php');
?>
<?php
$_SESSION['group']=1;
if(isset($_POST['addtocard']) || isset($_POST['addtocardinfav'])){
  $pid=$_GET['pid'];
 $query="SELECT * FROM product  WHERE pro_id=$pid";
                $result=mysqli_query($database->conn,$query);
                $row=mysqli_fetch_assoc($result);

 //$id=$_GET['pid'];
 $name=$row['pro_name'];
 $price=$row['pro_price'];
$img=$row['pro_img'];
if(isset($_POST['addtocardinfav'])){ $qua=1;
}else{
 $qua=$_POST['quantity'];}

  $total=$qua*$price;
if(isset($_SESSION['idc'])){
  $cust=$_SESSION['idc'];
}else{$cust=0;
}

$i=0;
$query="SELECT * FROM  order_details ";
                $result=mysqli_query($database->conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                  if($row["pro_id"]==$pid){
                    $i=1;
                  }
                }

 
  if($i==0){
$sql="INSERT INTO  order_details (cust_id,pro_id,pro_name,pro_price,pro_img,pro_qua,total,group_order) values('$cust','$pid','$name','$price','$img','$qua','$total','{$_SESSION["group"]}')";

mysqli_query($database->conn, $sql);
}
}

if(isset($_POST['quan'])){
$pid=$_GET['req'];

  
  $qua=$_POST['quan'];

  $query="SELECT * FROM order_details  WHERE pro_id=$pid";
                $result=mysqli_query($database->conn,$query);
                $row=mysqli_fetch_assoc($result);
                $total=$row['pro_price']*$qua;

                $sql="UPDATE order_details SET pro_qua='$qua',total='$total' where pro_id=$pid";

mysqli_query($database->conn, $sql);

}

if(isset($_GET['idd'])){
$query="DELETE FROM order_details WHERE order_id={$_GET['idd']}";
mysqli_query($database->conn,$query);
header("location:cart.php");

}

if(isset($_GET['close'])){
$_SESSION['group']=$_SESSION['group']+1;
header("location:cart.php");
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
                        <h2>card list</h2>
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
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">delet</th>
              </tr>
            </thead>
            <tbody>
             <?php  $query="SELECT * FROM  order_details ";
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
                echo"<form action='cart.php?req={$row["pro_id"]}' method='post'>";
                 echo' <div class="product_count">
                    <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                      class="input-text qty input-number" />
                    <button
                      class="increase input-number-increment items-count" type="button">
                      <i class="ti-angle-up"></i>
                    </button>
                    <button
                      class="reduced input-number-decrement items-count" type="button">
                      <i class="ti-angle-down"></i>
                    </button> -->
                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>';
                    echo"<input class='input-number' name='quan' type='submit' value='{$row["pro_qua"]}' min='0' max='10'>";
                    echo'<span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                  </div>
                  </form>
                </td>
                <td>';
                  echo"<h5>{$row["total"]}</h5>";
               echo' </td>
               <td>';
                  echo"<button type='button'  name='delet' class='btn btn-danger' ><a  href='cart.php?idd={$row["order_id"]}'>delete</a></button>";
               echo' </td>
              </tr>';
             
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