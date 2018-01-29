Grand total: &#8377;
<?php
session_start();
if(isset($_SESSION['users']))
{
    require_once("db.php");
    $q="SELECT total FROM cart_total WHERE user_id=".$_SESSION['users'];
	$r=mysqli_query($stat,$q);
	$row=mysqli_fetch_array($r);
	echo $row['total'];
}