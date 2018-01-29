<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION['users']))
{
?>
<head>
<title>Hearts on Hands - Store</title>

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
    <h2 class="page_title text-center"><span>My Orders</span><br />
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
        
        <div id="webstore-container">
          <div id="webstore-container-inner">
            
            <div class="webstore-clear" id="cart">
      <?php
      require_once("db.php");
      $uid=$_SESSION['users'];
      $query="SELECT * FROM orders o,order_list ol WHERE o.custid='$uid' and o.id=ol.order_id ORDER BY o.id desc";
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
              <span style="float: left; margin-left: 2%; font-size: 15px">Order No.</span>
              <span style="float: left;margin-left: 22%; font-size: 15px">Item</span>
              <span style="float: left;margin-left: 32%; font-size: 15px">Quantity</span>
              <span style="float: right; margin-right: 90px; font-size: 15px">Amount</span>
        </div>
        <div class="webstore-clear" id="cart-list">
        <ul >
        <?php
        while($row=mysqli_fetch_array($result))
        {
            ?>
            <li>
            <div style="float: left;">
            <?php 
            $q="SELECT * from shop WHERE id=".$row['item_id'];
            $r=mysqli_query($stat,$q);
            $row1=mysqli_fetch_array($r);
            ?>
            <br>
            <b style="font-size: 20px; margin-left: 20px">
            <?php echo $row['order_id'];?>
            </b>
            </div>
            <div style="width: 70%; float: right;">
              <span class="title" style="text-align: left; margin-left: 2%"><?php echo $row1['title'];?></span>
              <span style="font-size: 25px; margin-left: 40%"><b><?php echo $row['quantity']?> </b></span>
              <span style="font-size: 25px; margin-left: 25%"><?php echo $row1['amount']*$row['quantity'];?></span>
              <br>
              <span class="description" style="text-align: left;margin-left: 10px; font-family: Calibri; font-size: 15px; height: auto;">
                <span style="font-size: 15px"><b>Order Date : </b></span><?php $date=new dateTime($row['date']);
                                    echo $date=$date->format('d M Y'); ?>
                                    <br>
                <span style="font-size: 15px"><b>Delivery Date : </b></span><?php $date=new dateTime($row['date']);
                $date->add(new DateInterval('P15D'));
                echo $date=$date->format('d M Y'); ?>
               <br>
                <br>
              <div class="progress progress-striped active progress-sm" style="background-color: #ccc;">
               
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php 

                  echo $row['status']*25?>%;">
                       
                      <span class="sr-only"></span>
                  </div>
                      
                </div>
                 <b style="color: black;">
                    Status:
                    <?php
                        if($row['status']==1)
                        {
                          echo "Order Received";
                          if($row['paid']==0)
                          {?>
                            <b style="color: red"> (Not Paid)</b>
                          <?php
                          }
                          else if($row['paid']==1)
                          {?>
                            <b style="color: green"> (Paid)</b>
                          <?php
                          }
                        }
                        else if($row['status']==2)
                          echo "Under Process";
                        else if($row['status']==3)
                          echo "Dispatched";
                        else if($row['status']==1)
                          echo "Delivered";
                    ?>
                    </b>
                <center></center>
              </span>        
              <br>
            </div>
            </li>
            <?php
        }
        ?>
        </ul>
        </div>
        <br><br>
        
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