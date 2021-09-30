<?php
session_start();
unset($_SESSION['id']);
header("location:signin1.php");
?>