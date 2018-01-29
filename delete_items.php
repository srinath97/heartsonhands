<?php
session_start();
require_once("db.php");

if(isset($_SESSION['users']))
{
  $q="DELETE FROM cart WHERE user=".$_SESSION['users'];
  mysqli_query($stat,$q);
  $q="DELETE FROM cart_total WHERE user_id=".$_SESSION['users'];
  mysqli_query($stat,$q);
  echo "<script>alert(\"Removed all items from cart!\")</script>";
  header("refresh:0;url=cart.php");
}
else
{
header("refresh:0;url=login.php");
}
?>