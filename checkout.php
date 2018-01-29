<!DOCTYPE html>
<html>
<?php
session_start();
require_once("db.php");
if(isset($_SESSION['users']))
{
   if(isset($_POST['checkout'])||isset($_POST['submit_portal']))
   {
     if(isset($_POST['email']))
	    $email=mysqli_real_escape_string($stat,trim($_POST['email']));
     else
	    $email="";
	 if(isset($_POST['full_name']))
	    $full_name=mysqli_real_escape_string($stat,trim($_POST['full_name']));
     else
	    $full_name="";
	 if(isset($_POST['addr_line_1']))
	    $addr_line_1=mysqli_real_escape_string($stat,trim($_POST['addr_line_1']));
     else
	    $addr_line_1="";
	 if(isset($_POST['addr_line_2']))
	    $addr_line_2=mysqli_real_escape_string($stat,trim($_POST['addr_line_2']));
     else
	    $addr_line_2="";
	 if(isset($_POST['city']))
	    $city=mysqli_real_escape_string($stat,trim($_POST['city']));
     else
	    $city="";
	 if(isset($_POST['state']))
	    $state=mysqli_real_escape_string($stat,trim($_POST['state']));
     else
	    $state="";
	 if(isset($_POST['postal_code']))
	    $postal_code=mysqli_real_escape_string($stat,trim($_POST['postal_code']));
     else
	    $postal_code="";
	 if(isset($_POST['phone_number']))
	    $phone_number=mysqli_real_escape_string($stat,trim($_POST['phone_number']));
     else
	    $phone_number="";
	if(isset($_POST['url']))
	    $url=$_POST['url'];
     else
	    $url="";
	 require_once("db.php");
	 if(isset($_POST['submit_portal']))
	 {  if(!empty($email)&&!empty($full_name)&&!empty($addr_line_1)&&!empty($addr_line_2)&&!empty($city)&&
	     !empty($state)&&!empty($postal_code)&&!empty($phone_number)&&!empty($url))
		 {
		  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         echo "<script>alert(\"Invalid email format!\");</script>";
              }
		  else if (!is_numeric($phone_number)) {
         echo "<script>alert(\"Invalid phone number!\");</script>";
              }
		  else
		  {
		    $addr=$full_name.",".$addr_line_1.",".$addr_line_2.",".$city.",".$state.",".$postal_code;
			$phone=$phone_number;
			$name=$full_name;
			$date=date("Y-m-d H:i:s");
			$q="INSERT INTO orders(id,custid,paid,date,name,email,phone,address,url,status) VALUES(NULL,".$_SESSION['users'].",0,'$date','$name','$email','$phone','$addr','$url',1)";
			mysqli_query($stat,$q);
			$q="SELECT id FROM orders WHERE date=\"".$date."\"";
			$result=mysqli_query($stat,$q);
			$row=mysqli_fetch_array($result);
			$id=$row['id'];
			$q="SELECT * FROM cart WHERE user=".$_SESSION['users'];
			$result=mysqli_query($stat,$q);
			while($row=mysqli_fetch_array($result))
			{
				$item_id=$row['item_id'];
				$quantity=$row['quantity'];
				$q="INSERT INTO order_list(id,order_id,item_id,quantity) VALUES(NULL,'$id','$item_id','$quantity')";
				mysqli_query($stat,$q);
			}
			$q="SELECT total FROM cart_total WHERE user_id=".$_SESSION['users'];
			$result=mysqli_query($stat,$q);
			$row=mysqli_fetch_array($result);
			$grand_total=$row['total'];
			
			//payment_portal();

			$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER,
					array("X-Api-Key:372ee85d46118aab70ae46f4e4b4e193",
						  "X-Auth-Token:b2b54cf8dc8182987ab175a9a374bd5f"));
		$payload = Array(
			'purpose' => 'HoH',
			'amount' => $grand_total,
			'phone' => $phone,
			'buyer_name' => $name,
			'redirect_url' => 'http://www.hohcreations.co.in/summary.php',
			'send_email' => '1',
			'webhook' => 'http://www.hohcreations.co.in/webhook.php',
			'send_sms' => '1',
			'email' => $email,
			'allow_repeated_payments' => false
		);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
		$response = curl_exec($ch);
		curl_close($ch); 
		$t=json_decode($response,true);
		
		print_r($response);
                 $check=0;
                if(isset($t['success']))
                {
                   if((string)($t['success'])=="false")
                   $check=1;
                }
                if($check==0)
                {
                $redir_url=(string)$t['payment_request']['longurl'];
				$q="UPDATE orders SET longurl=\"".$redir_url."\",payment_request_id=\"".(string)$t['payment_request']['id']."\" WHERE id=".$id;
				mysqli_query($stat,$q);
		            $q="DELETE FROM cart WHERE user=".$_SESSION['users'];
					mysqli_query($stat,$q);
					$q="DELETE FROM cart_total WHERE user_id=".$_SESSION['users'];
					mysqli_query($stat,$q);
		                header("Location:".$redir_url);
		                }
		                else
		                {
		                 echo "Oops! Something has gone wrong. Please go back to the cart and checkout again!";
		                }
				exit;
				//echo $response;			
							
				  }
				 }
				 
				else
				{
				  echo "<script>alert(\"Please fill in all the details!\");</script>";
				}
			 }
		     $query="SELECT * FROM cart_total WHERE user_id=".$_SESSION['users'];
			 $result1=mysqli_query($stat,$query);
?>
<head>
<title>Hearts on Hands - Store</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/storebootstrap.min.css" rel="stylesheet">
<link href="css/storestyle.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/work.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<style type="text/css">
	input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

</style>
</head>
<body style="background-image: url('images/gallery.jpg')">
<div class="navbar-wrapper">
    <div class="container">
    <nav class="navbar navbar-inverse navbar-static-top cl-effect-21">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="images/logo.png" height="50px"><a class="navbar-brand" href=""><!----> <h1><img src="images/banner.jpg" height="24px"></h1></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#feature">About us</a></li>
            <li><a href="index.php#gallery">Gallery</a></li>
            <li><a href="index.php#testimonial">Feedback</a></li>
            <li><a href="index.php#contact">Contact</a></li>
            <li><a href="shop.php">Shop</a></li>
            <?php 
            if(isset($_SESSION['users']))
            {
              ?>
              <li><a href="profile.php">My Profile</a></li>
              <?php
            }
            if(isset($_SESSION['users']))
            {
              ?>
              <li><a href="logout.php">Logout</a></li>
              <?php
            }
            else
            {?>
              <li><a href="login.php">Login/Sign-Up</a></li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
        </nav>
  </div>
</div>
<br><br><br><br>
<section class="main__middle__container">
  <div class="container recent-posts">
    <h2 class="page_title text-center"><span>Check-Out</span><br />
      <span class="sep"></span><br />
    <div class="row no-margin no_padding"> 
      
      <!-- ////////////////////////////////////////////////////////////// START SHOPPING CART ///////////////////////////////////////////////////////////////// --> 
      
      <script type="text/javascript" src="webstore/js/jquery-1.7.2.min.js"></script> <!-- (do not call twice) --> 
      
      <!-- DC Instant.Webstore JS --> 
      <script src="webstore/js/jquery.instant.webstore.js"></script> 
      
      <!-- DC Instant.Webstore CSS -->
      <link rel="stylesheet" href="webstore/css/style.css">
      <div id="webstore">
       
        <div id="webstore-container">
          <div id="webstore-container-inner">
            
            <div class="webstore-clear" id="cart">
			<?php
			require_once("db.php");
			?>
             <div class="webstore-clear" id="checkout">
			<?php
			$query="SELECT * FROM cart WHERE user=".$_SESSION['users'];
			$result=mysqli_query($stat,$query);
			if(mysqli_num_rows($result)==0)
			{?>
              <div class="cart-is-empty">Your shopping cart is empty.</div>
			<?php
			}
			else
			{
			?>
		
              <div class="cart-is-full">
                <form method="POST"  onsubmit="return confirm_update();" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <table cellspacing="0">
                    <tr>
                      <td><label>Email address *</label></td>
                      <?php
						$queryx="SELECT * FROM customer WHERE id=".$_SESSION['users'];
						$resultx=mysqli_query($stat,$queryx);
						$rowx=mysqli_fetch_array($resultx);
						
						?>
                      <td><input value="<?php echo $email;?>" name="email" ></td>
                    </tr>
                  </table>
                  
                  <table cellspacing="0" id="checkout-ship-to-address">
                    <tr>
                      <td><h3>Shipping address *</h3></td>
                    </tr>
                  </table>
                  <table cellspacing="0">
                    <tr>
                      <td><label>Full name *</label></td>
                      <td><table cellspacing="0">
                          <tr>
                            <td><input value="<?php echo $full_name;?>" name="full_name"></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><label>Address line 1 *</label></td>
                      <td><input value="<?php echo $addr_line_1;?>" name="addr_line_1"></td>
                    </tr>
                    <tr>
                      <td><label>Address line 2 *</label></td>
                      <td><input value="<?php echo $addr_line_2;?>" name="addr_line_2"></td>
                    </tr>
                    <tr>
                      <td><label>City *</label></td>
                      <td><input name="city" value="<?php echo $city;?>"></td>
                    </tr>
                    <tr>
                      <td><label>State *</label></td>
                      <td><select name="state">
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chandigarh">Chandigarh</option>
						<option value="Chhattisgarh">Chhattisgarh</option>
						<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
						<option value="Daman and Diu">Daman and Diu</option>
						<option value="Delhi">Delhi</option>
						<option value="Goa">Goa</option>
						<option value="Gujarat">Gujarat</option>
						<option value="Haryana">Haryana</option>
						<option value="Himachal Pradesh">Himachal Pradesh</option>
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Kerala">Kerala</option>
						<option value="Lakshadweep">Lakshadweep</option>
						<option value="Madhya Pradesh">Madhya Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
						<option value="Manipur">Manipur</option>
						<option value="Meghalaya">Meghalaya</option>
						<option value="Mizoram">Mizoram</option>
						<option value="Nagaland">Nagaland</option>
						<option value="Orissa">Orissa</option>
						<option value="Pondicherry">Pondicherry</option>
						<option value="Punjab">Punjab</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Sikkim">Sikkim</option>
						<option value="Tamil Nadu">Tamil Nadu</option>
						<option value="Tripura">Tripura</option>
						<option value="Uttaranchal">Uttaranchal</option>
						<option value="Uttar Pradesh">Uttar Pradesh</option>
						<option value="West Bengal">West Bengal</option>
                        </select></td>
                    </tr>
                    <tr>
                      <td><label>Postal code *</label></td>
                      <td><input name="postal_code" size="6" value="<?php echo $postal_code;?>"></td>
                    </tr>
                    <tr>
                      <td><label>URL of photos (Upload the photos in Google Drive and enter the url here) *</label></td>
                      <td><input name="url" type="text" value="<?php echo $url;?>" ></td>
                    </tr>
                    
					<tr>
                      <td><label>Phone number*</label></td>
                      <td><input type="number" name="phone_number" size="12" value="<?php echo $contact;?>"></td>
                    </tr>
                  </table>
                  <hr>
                  <div class="webstore-clear cart-totals">
                    <div class="left">* Required fields</div>
                    <div class="right">
                      <label>Grand Total</label>
                      <span class="cart-total">
					  <?php
					  $query="SELECT total from cart_total WHERE user_id=".$_SESSION['users'];
					  $result=mysqli_query($stat,$query);
					  $row=mysqli_fetch_array($result);
					  echo $row['total'];
					  ?>
					  </span><br>
                      <br>
                      <button name="submit_portal" class="right authorizenet" type="submit"><span>Place Order</span></button>
                    </div>
                  </div>
                </form>
              </div>
			<?php
			}
			?>
			</div>
            </div>
            </div>
          </div>
        </div>
      </div>
	  <script>
	  function confirm_update()
{
  if(confirm("Proceed to payment portal?"))
  {
    return true;
  }
  else
  {
    return false;
  }
}
	  
	  </script>
      <!-- DC Instant.Webstore End --> 
      
      <!-- DC Instant.Webstore Settings --> 
      
      <div class="dc_clear"></div>
      <!-- line break/clear line --> 
      
      <br />
      <br />
      
      <!-- ////////////////////////////////////////////////////////////// END SHOPPING CART ///////////////////////////////////////////////////////////////// --> 
      
    </div>
  </div>
</section>
<footer>
  <div class="container">
    <hr>
    <p class="text-center">&copy; Copyright Hearts on Hands. All Rights Reserved.</p>
  </div>
</footer>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
<?php
}
else
{
     header("refresh:0;url=cart.php");
}
}
else
{
    header("refresh:0;url=login.php");
}
?>
</html>	