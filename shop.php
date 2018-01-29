<!DOCTYPE html>
<html>
<head>
<title>Hearts on Hands - Store</title>
<?php
session_start();
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Hearts On Hands">
<meta name="Keywords" content="hearts on hands,Hearts On Hands,hoh creations,hohcreations,heartsonhands,greeting cards,hand made greeting cards,explosion box,occasional cards,magic cube,pop-up cards,heart collage,scrap book,layered cards,infinite cards">

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
          <img src="images/logo.png" height="50px"><a class="navbar-brand" href="index.php"><!----> <h1><img src="images/banner.jpg" height="24px"></h1></a>
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
      
      <script type="text/javascript" src="webstore/js/jquery-1.7.2.min.js"></script> <!-- (do not call twice) --> 
      
      <!-- DC Instant.Webstore JS --> 
      <script src="webstore/js/jquery.instant.webstore.js"></script> 
      
      <!-- DC Instant.Webstore CSS -->
      <link rel="stylesheet" href="webstore/css/style.css">
      <div id="webstore">
	  <!--TABS-->
        <ul id="webstore-navigation">
          <li><a class="store-tab" href="#catalogue">Catalogue</a></li>
          <li><a class="current store-tab" href="./cart.php">Cart <?php
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
	<!--END OF TABS-->  
        <div id="webstore-container">
          <div id="webstore-container-inner">
            <div class="webstore-clear" id="catalogue">
              <ul>
                <?php
          				require_once("db.php");
          				$flag=0;
          				$query="SELECT * FROM shop order by id desc";
          				$result=mysqli_query($stat,$query);
          				if(mysqli_num_rows($result)==0)
          				{
          				    echo "<h2>No products found :(</h2>";
          				}
          				while($row=mysqli_fetch_array($result))
          				{
          				?>
              				<li style="width: 1000px; margin: 10px" class="product" data-id="<?php echo $row['id'];?>">
                      <div class="webstore-clear" >
                        <div class="webstore-clear" style=" float: left;width: 30%;"><a href="item.php?id=<?php echo $row['id']; ?>"><img class="left" height="100%" width="100%" src="images/shop/<?php echo $row['image1']?>"></a> <!-- Add item images to /webstore/ -->
                        </div>
                        <div  style="margin-left: 3%;width: 65%; float: left">
                            <h3 style="text-transform: uppercase;float: left; "><a href="item.php?id=<?php echo $row['id']; ?>"><?php echo $row['title'];?></a><?php 
                                        for($j=0;$j<$row['rating'];$j++)
                                        {?>
                                            <img src="images/star.jpg" width="28px">
                                        <?php
                                        }
                                     ?>
                            </h3> <br><br><br>
                            <div class="left" style="text-align: left; font-size: 15px; font-family: Calibri"><?php echo $row['description'];?><br><br><br>
                                <b style="font-size: 25px">Availabe: </b>
                    						<?php 
                    						if($row['available']==1)
                    						{?>
                                  <img src="images/yes.png" width="28px">
                                  <?php
                                }
                    						else
                    						{?>
                                  <img src="images/no.png" width="28px">
                                  <?php
                                }
                    						?>
                               <span class="right price">&#8377;<?php echo $row['amount'];?></span>
                            </div>
                            <form method="POST" action="./add_to_cart.php">
                                <div class="left"> 
                                   <?php
                                    if($row['available']==1)
                                    {?>
                                    <input type="hidden" name="item_id" value="<?php echo $row['id'];?>" />
                                    <button type="submit" style="width: 200px"><span>Add to Cart</span></button>
                                    <?php
                                    }
                                    else
                                    {?>
                                    <button onclick="error1();" class="left purchase" type="button"><span>Item not available</span></button><br/>
                                    <?php
                                    }
                                    ?>
                                </div>
                             </form>
    						          </div>
                          </div>
                        </li>
                				<?php
            				}
            				?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- DC Instant.Webstore End --> 
      
      <!-- DC Instant.Webstore Settings --> 
      <script>
	  
                        </script>
      <div class="dc_clear"></div>
      <!-- line break/clear line --> 
      
      <br />
      <br />
      
      <!-- ////////////////////////////////////////////////////////////// END SHOPPING CART ///////////////////////////////////////////////////////////////// --> 
      
    </div>
  </div>
</section>
<footer style="height: 20px">
  <div class="container" >
    
    <div style="margin-top: -40px" class="text-center">&copy; Copyright Hearts on Hands. All Rights Reserved.</div>
  </div>
</footer>
<script>
function error1()
{
  alert("Sorry! This item is not available at the moment! :(");
}
</script>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>