<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION['users']))
{
?>
<head>
<title>Hearts on Hands - Store</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/storebootstrap.min.css" rel="stylesheet">
<link href="css/storestyle.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<link rel="shortcut icon" href="assets/ico/favicon.png">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/work.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<style type="text/css">
  input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

</style>

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
    <h2 class="page_title text-center"><span>Web Store</span><br />
      <span class="sep"></span><br />
    <div class="row no-margin no_padding"> 
      
      <!-- ////////////////////////////////////////////////////////////// START SHOPPING CART ///////////////////////////////////////////////////////////////// --> 
      <script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>

      <script type="text/javascript" src="webstore/js/jquery-1.7.2.min.js"></script> <!-- (do not call twice) --> 
      
      <!-- DC Instant.Webstore JS --> 
      <script src="webstore/js/jquery.instant.webstore.js"></script> 
      
      <!-- DC Instant.Webstore CSS -->
      <link rel="stylesheet" href="webstore/css/style.css">
      <div id="webstore">
        <ul id="webstore-navigation">
          <li><a class="current store-tab" href="./shop.php">Catalogue</a></li>
          <li><a class="store-tab" href="">Cart <?php
                  if(isset($_SESSION['users']))
                  {
                    require_once("db.php");
                    $flag=0;
                    $uid=$_SESSION['users'];
                    $query1="SELECT * FROM cart where user='$uid'";
                    $result1=mysqli_query($stat,$query1);
                    if(mysqli_num_rows($result1)!=0)
                    {
                        echo '('.mysqli_num_rows($result1).")";
                    }
                  }
                    ?></a></li>
        </ul>
        <div id="webstore-container">
          <div id="webstore-container-inner">
            
            <div class="webstore-clear" id="cart">
			<?php
			require_once("db.php");
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
          <div class="webstore-clear" id="cart-heading">
      				<span style="float: left; margin-left: 2%; font-size: 15px">Item</span>
              <span style="margin-left: 15%; font-size: 15px">Quantity</span>
              <span style="float: right; margin-right: 90px; font-size: 15px">Amount</span>
				</div>
        <div class="webstore-clear" id="cart-list">
				<ul>
				<?php
				while($row=mysqli_fetch_array($result))
    		{
    				?>
    				<li>
    				<div style="width: 30%; float: left">
    				<?php 
    				$q="SELECT * from shop WHERE id=".$row['item_id'];
    				$r=mysqli_query($stat,$q);
    				$row1=mysqli_fetch_array($r);
    				?>
    				<img style="" src="images/shop/<?php echo $row1['image1'];?>" />
    				</div>
    				<div style="width: 70%; float: left">
    				<span class="title" style="text-align: left; margin-left: 2%"><?php echo $row1['title'];?></span>
            <br>
    				<span class="description" style="height: 150px; text-align: left;margin-left: 10px; font-family: Calibri; font-size: 15px"><?php echo $row1['description'];?>
            <br><br>
            <span style="font-size: 15px"><b>Price: &#8377;</b><?php echo $row1['amount'];?></span>
            <br><br>
            <span style="font-size: 15px"><b>Delivery in 10-15 days </b></span>
    				<span class="gradient"></span>
    				</span> 
    				<input class="quantity" id="<?php echo "item_".$row1['id'];?>" value="<?php echo $row['quantity'];?>" />
                    <script>
    				$('#item_<?php echo $row1['id'];?>').bind('input', function() {
                    var q=$(this).val(); // get the current value of the input field.
    				 $.get("update_quantity.php?id="+<?php echo $row1['id'];?>+"&quantity="+q,function(data,status)
    		             {
    					    if(data!="")
                            document.getElementById("div_<?php echo $row1['id'];?>").innerHTML=data;		               
    	                 });
                   });
    			   $('#item_<?php echo $row1['id'];?>').bind('input', function() {
                    var q=$(this).val(); // get the current value of the input field.
    				 $.get("get_total.php",function(data,status)
    		             {
    					    if(data!="")
                            document.getElementById("div_total").innerHTML=data;		               
    	                 });
                   });
    			   </script>
    				<span class="price">
    				<span><div id="div_<?php echo $row1['id'];?>"><?php echo $row1['amount']*$row['quantity'];?></div></span>
    				</span>
    				</li>
    				<?php
				}
				?>
				</ul>
				</div>
        <br><br>
        
				 <div class="webstore-clear">
                   <form method="POST" action="checkout.php">
                   <div style="font-size: 25px; margin-right: 75px" id="div_total" class="right" >
                      Grand total: &#8377;
                      <?php
                      $q="SELECT total FROM cart_total WHERE user_id=".$_SESSION['users'];
                      $r=mysqli_query($stat,$q);
                      $row=mysqli_fetch_array($r);
                      echo $row['total'];
                            ?>
                      </div>
                  <button class="left empty" name="checkout" type="submit"><span>Proceed to checkout</span></button>
                   </form>
                </div>
                <hr>
				<form method="POST" action="delete_items.php"/>
                <div class="webstore-clear">
                  <button class="left empty" type="submit"><span>Empty cart</span></button>
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
    header("refresh:0;url=login.php");
}
?>
</html>