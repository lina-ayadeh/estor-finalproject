
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
$sql="INSERT INTO admin (admin_email,admin_pass,admin_name,admin_img) values('$email','$pass','$fname','$image_name')";

mysqli_query($this->conn, $sql);
header("location:maneg_admin.php");
} 
public function delet($id){
    $query="DELETE FROM admin WHERE admin_id=$id";
mysqli_query($this->conn,$query);
header("location:maneg_admin.php");
}

public function update($fname,$pass,$email,$image,$id){
$sql="UPDATE admin SET admin_email='$email',admin_pass='$pass',admin_name='$fname',admin_img='$image' where admin_id=$id";

mysqli_query($this->conn, $sql);
header("location:maneg_admin.php");
}



} 
$database = new Database();
$database->connect_db();


?>