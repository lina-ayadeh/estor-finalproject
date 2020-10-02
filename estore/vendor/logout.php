<?php
session_start();
unset($_SESSION['idvendor']);
header("location:login.php");

?>