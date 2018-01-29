<?php
session_start();
if(isset($_SESSION['users']))
{
    require_once("db.php");
    if(isset($_GET['quantity'])&&isset($_GET['id'])&&is_numeric($_GET['quantity'])&&!empty($_GET['quantity'])&&($_GET['quantity']>0))
	{
	    $id=$_GET['id'];
		//check if item available
		$q="SELECT amount FROM shop WHERE id='$id' && available=1";
		$result=mysqli_query($stat,$q);
		if(mysqli_num_rows($result)!=0)
		{
		$row=mysqli_fetch_array($result);
		$quantity=$_GET['quantity'];
		$price_per=$row['amount'];
		$price_new=$price_per*$quantity;
		$q="SELECT quantity FROM cart WHERE user=".$_SESSION['users']." && item_id='$id'";
		$result=mysqli_query($stat,$q);
		$row=mysqli_fetch_array($result);
		$quant_temp=$row['quantity'];
		$price_temp=$quant_temp*$price_per;
		$q="UPDATE cart SET quantity=".$quantity." WHERE user=".$_SESSION['users']." && item_id='$id'";
		mysqli_query($stat,$q);
		$q="SELECT total FROM cart_total WHERE user_id=".$_SESSION['users'];
		$result=mysqli_query($stat,$q);
		$row=mysqli_fetch_array($result);
		$total=$row['total']-$price_temp+$price_new;
		$q="UPDATE cart_total SET total='$total' WHERE user_id=".$_SESSION['users'];
		mysqli_query($stat,$q);
		echo $price_new;
		}
		else
		{
		echo "<script>alert(\"Incorrect value!\")</script>";
		}
	}
}
else
{
header("refresh:0;url=login.php");
}
?>