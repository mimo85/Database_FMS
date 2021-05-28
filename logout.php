<?php 
session_start();
$_SESSION["isLoggedin"]=false;
echo"<script>location.assign('login.php');</script>";
?>