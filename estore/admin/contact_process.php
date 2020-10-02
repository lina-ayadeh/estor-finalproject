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
  }
  $database = new Database();
$database->connect_db();

 include_once('include/admin_header.php');



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
                <h3 class="card-title">user_nots</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>user_name</th>
                    <th>user_email</th>
                    <th>msg_subject</th>
                    <th>themasseg</th>
                    
                    


                  </tr>
                  </thead>
                  <tbody>

                <?php 
                   $quary="SELECT * FROM user_msg";
                    $result=mysqli_query($database->conn,$quary);
                    while($admin=mysqli_fetch_assoc($result)){
                                        
                  echo '<tr>';
                    echo "<td>{$admin['user_name']}</td>";
                    echo "<td>{$admin['user_email']}</td>";
                    echo "<td>{$admin['msg_subject']}</td>";
                      echo "<td>{$admin['themsg']}</td>";

                  
                echo "</tr>";
            }

                    ?>

                 
                  </tbody>
                 
                </table>
                
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

     <?php  include_once('include/admin_footer.php')
  ?>
