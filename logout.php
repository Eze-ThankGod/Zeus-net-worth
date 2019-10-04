<?php
session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['name']);
  header("location:index.php");
  exit();

}
?>