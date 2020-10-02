
<?php

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
   public function createpro($catid,$subid,$fname,$price,$desc,$numpro,$image_name){
   
$allow="allow";
 $sql="INSERT INTO product (cat_id,sub_cat_id,pro_name,pro_price,pro_desc,numpro,block_allow,pro_img)
 values('$catid','$subid','$fname','$price','$desc','$numpro','$allow','$image_name')";

mysqli_query($this->conn, $sql);
header("location:maneg_product.php");
} 
public function deletpro($id){
    $query="DELETE FROM product WHERE pro_id=$id";
mysqli_query($this->conn,$query);
header("location:maneg_product.php");
}

public function updatepro($catid,$subid,$fname,$price,$desc,$numpro,$image,$id){
$sql="UPDATE product SET cat_id='$catid',sub_cat_id='$subid',pro_name='$fname',pro_price='$price',pro_desc='$desc',numpro='$numpro',pro_img='$image' where pro_id=$id";

mysqli_query($this->conn, $sql);
header("location:maneg_product.php");
}



} 
$database = new Database();
$database->connect_db();


?>