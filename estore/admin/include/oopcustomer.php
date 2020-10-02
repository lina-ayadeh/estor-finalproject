
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
   public function createcus($fname,$pass,$email,$mobile,$adress,$image_name){
$sql="INSERT INTO customer (customer_email,customer_pass,customer_name,customer_mobile,customer_adress,customer_img)
 values('$email','$pass','$fname','$mobile','$adress','$image_name')";

mysqli_query($this->conn, $sql);
header("location:maneg_customer.php");
} 
public function deletcus($id){
    $query="DELETE FROM customer WHERE customer_id=$id";
mysqli_query($this->conn,$query);
header("location:maneg_customer.php");
}

public function updatecus($fname,$pass,$email,$mobile,$adress,$image,$id){
$sql="UPDATE customer SET customer_email='$email',customer_pass='$pass',customer_name='$fname',customer_mobile='$mobile',customer_adress='$adress',customer_img='$image' where customer_id=$id";

mysqli_query($this->conn, $sql);
header("location:maneg_customer.php");
}



} 
$database = new Database();
$database->connect_db();


?>