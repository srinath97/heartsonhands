<?php
session_start();
if(isset($_SESSION['users']))
{
   if(isset($_POST['item_id']))
   {  
      require_once("db.php");
      $id=$_POST['item_id'];
	  $query="SELECT * FROM shop WHERE id=".$id." && available=1";
	  $result=mysqli_query($stat,$query);
	  if(mysqli_num_rows($result)!=0)
	  {
	     $query1="SELECT * FROM cart WHERE user=".$_SESSION['users']." && item_id=".$id;
		 $result1=mysqli_query($stat,$query1);
		 if(mysqli_num_rows($result1)==0)
		 {
			 $query2="INSERT INTO cart(id,user,item_id,quantity) VALUES(NULL,".$_SESSION['users'].",".$id.",1)";
			 mysqli_query($stat,$query2);
			 $query3="SELECT total FROM cart_total WHERE user_id=".$_SESSION['users'];
			 $result=mysqli_query($stat,$query3);
			 if(mysqli_num_rows($result)!=0)
			 {
				 $row2=mysqli_fetch_array($result);
				 $temp_total=$row2['total'];
			 }
			 else
			 {
			 	$temp_total=0;
			 }
			 $query4="SELECT amount FROM shop WHERE id=".$id;
			 $result2=mysqli_query($stat,$query4);
			 $row3=mysqli_fetch_row($result2);
			 $amount=$row3[0];
			 $temp_total+=$amount;
			 mysqli_query($stat,"DELETE FROM cart_total WHERE user_id=".$_SESSION['users']);
			 $query5="INSERT INTO cart_total VALUES(NULL,".$_SESSION['users'].",'$temp_total')";
			 mysqli_query($stat,$query5);
			 echo "<script>alert(\"Successfully added to cart!\");</script>";
		 	 
		 }
		 else
		 {
		 	echo "<script>alert(\"Item already in cart!\");</script>";
		 }
		 header("refresh:0;url=shop.php");
	  }
	  else
	  {
	     echo "<script>alert(\"Requested item is not available\");</script>";
		 echo "<meta http-equiv=\"refresh\" content=\"0;URL=shop.php\">";
	  }
   }
   else
   {
       header("refresh:0;url=shop.php");
   }
}
else
{
   header("refresh:0;url=login.php");
}
?>