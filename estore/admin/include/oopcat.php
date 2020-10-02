
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
   public function createcat($fname,$image_name){
$sql="INSERT INTO category (cat_name,cat_img)
 values('$fname','$image_name')";

mysqli_query($this->conn, $sql);
header("location:maneg_category.php");
} 
public function deletcat($id){
    $query="DELETE FROM category WHERE cat_id=$id";
mysqli_query($this->conn,$query);
header("location:maneg_category.php");
}

public function updatecat($fname,$image,$id){
$sql="UPDATE category SET cat_name='$fname',cat_img='$image' where cat_id=$id";

mysqli_query($this->conn, $sql);
header("location:maneg_category.php");
}



} 
$database = new Database();
$database->connect_db();


?>