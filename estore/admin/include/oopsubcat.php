
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
   public function createsub($fname,$img){
$sql="INSERT INTO sub_category (sub_cat_name,sub_img)
 values('$fname','$img')";

mysqli_query($this->conn, $sql);
header("location:maneg_subcat.php");
} 
public function deletsub($id){
    $query="DELETE FROM sub_category WHERE sub_cat_id=$id";
mysqli_query($this->conn,$query);
header("location:maneg_subcat.php");
}

public function updatesub($fname,$img,$id){
$sql="UPDATE sub_category SET sub_cat_name='$fname',sub_img='$img' where sub_cat_id=$id";

mysqli_query($this->conn, $sql);
header("location:maneg_subcat.php");
}



} 
$database = new Database();
$database->connect_db();


?>