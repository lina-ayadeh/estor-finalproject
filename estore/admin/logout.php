<?php
session_start();
unset($_SESSION['idadmin']);
header("location:login.php");

?>