<?php
session_start();
$_SESSION['group']=$_SESSION['group']+1;
unset($_SESSION['idc']);
header("location:index.php");

?>