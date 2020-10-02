
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
   public function create($fname,$pass,$email,$image_name){
$sql="INSERT INTO vendor (vendor_email,vendor_pass,vendor_name,vendor_img) values('$email','$pass','$fname','$image_name')";

mysqli_query($this->conn, $sql);
header("location:maneg_vendor.php");
} 
public function delet($id){
    $query="DELETE FROM vendor WHERE vendor_id=$id";
mysqli_query($this->conn,$query);
header("location:maneg_vendor.php");
}

public function update($fname,$pass,$email,$image,$id){
$sql="UPDATE vendor SET vendor_email='$email',vendor_pass='$pass',vendor_name='$fname',vendor_img='$image' where vendor_id=$id";

mysqli_query($this->conn, $sql);
header("location:maneg_vendor.php");
}



} 
$database = new Database();
$database->connect_db();


?>