
<?php
ob_start();

class Database{
    public $conn;
public function __construct()
{
    $this->connect_db();
}
    public function connect_db(){
        $this->conn=mysqli_connect("localhost","root","","estore");
if(mysqli_connect_error()){
    die("cannot conect to server". mysqli_connect_error() . mysqli_connect_errno());
        }
    }
   public function createpro($catid,$subid,$id,$fname,$price,$desc,$numpro,$image_name){
$sql="INSERT INTO product (cat_id,sub_cat_id,vendor_id,pro_name,pro_price,pro_desc,numpro,pro_img,block_allow)
 values('$catid','$subid','$id','$fname','$price','$desc','$numpro','$image_name','block')";
mysqli_query($this->conn, $sql);
header("location:maneg_product.php");
} 
} 
$database = new Database();
$database->connect_db();


?>