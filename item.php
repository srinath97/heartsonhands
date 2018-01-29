<!DOCTYPE html>
<html>
<head>
<title>Hearts on Hands - Store</title>
<?php
session_start();
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  require_once("db.php");
  $flag=0;
  $query="SELECT * FROM shop where id='$id'";
  $result=mysqli_query($stat,$query);
  if($row=mysqli_fetch_array($result))
  {

?>
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



<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="js/jquery.gallerax-0.2.js"></script>
<script type="text/javascript" src="js/filter.js"></script>
<link rel="stylesheet" type="text/css" href="css/style1.css" />

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
      
      
      <!-- DC Instant.Webstore CSS -->
      <link rel="stylesheet" href="webstore/css/style.css">
      <div id="webstore">
	  <!--TABS-->
        
	<!--END OF TABS-->  
        <div id="webstore-container">
            
          <div id="webstore-container-inner">
          
            <div class="webstore-clear" id="catalogue">
              <ul>
              				<li style="width: 1000px; margin: 10px" class="product" data-id="<?php echo $row['id'];?>">
                      <div class="webstore-clear" >
                      <h3 style="text-transform: uppercase;float: left; "><a href="item.php?id=<?php echo $row['id']; ?>"><?php echo $row['title'];?></a>
                            </h3><br><br>
                      <!--
                      <div id="Fader" class="fader" style="width: 60%;position: relative;" >
                            <?php
                              for($i=1;$i<=5;$i++)
                              {
                                  if($row['image'.$i]!="")
                                  {?>
                                      <img class="slide img-responsive" style="max-height: 450px" src="images/shop/<?php echo $row['image'.$i]?>" alt="w3layouts" > 
                                  <?php
                                  }
                              }
                              ?>
                              <div class="fader_controls">
                                <div class="page prev" data-target="prev">&lsaquo;</div>
                                <div class="page next" data-target="next">&rsaquo;</div>
                              
                              </div>
                      </div>
                      -->

    <div id="wrapper">
    
      <div id="gallery">
      
      
      <!-- start -->

          <div id="output">
            <img src="images/1.jpg" alt="" />
          </div>
          
          <div id="captions" style="visibility:hidden">
          
            <span class="line">Monument Valley</span>
            <br class="clear" />
            <span class="line2">A scenic shot of Monument Valley in Utah.</span>
            
            
          </div>      

          <ul class="thumbnails" style="">

              <?php
              for($i=1;$i<=5;$i++)
              {
                  if($i==1)
                  {?>
                      <li class="first">
                      <?php
                  }
                  else if($i==5||$row['image'.($i+1)]=="")
                   {?>
                      <li class="last">
                      <?php
                  } 
                  else
                   {?>
                      <li class="">
                      <?php
                  }
                  if($row['image'.$i]!="")
                  {?>
                      <img style="margin-top: -60px" src="images/shop/<?php echo $row['image'.$i] ?>" title="" alt="" width="100" height="75" /></li>
                  <?php
                  }
              }
              ?>

          </ul>

          <br class="clear" />
          
          <script type="text/javascript">

            $.gallerax({
              outputSelector:     '#output img',        // Output selector
              thumbnailsSelector:   '.thumbnails li img',   // Thumbnails selector
              captionSelector:    '#captions .line',      // Caption selector
              captionLines:     2,              // Caption lines (3 lines)
              fade:           'fast',           // Transition speed (fast)
              navNextSelector:    '#nav a.navNext',     // 'Next' selector
              navPreviousSelector:  '#nav a.navPrevious',   // 'Previous' selector
              navFirstSelector:   '#nav a.navFirst',      // 'First' selector
              navLastSelector:    '#nav a.navLast',     // 'Last' selector
              navStopAdvanceSelector: '#nav a.navStopAdvance',  // 'Stop Advance' selector
              navPlayAdvanceSelector: '#nav a.navPlayAdvance',  // 'Play Advance' selector
              advanceFade:      'slow',           // Advance transition speed (slow)
              advanceDelay:     4000,           // Advance delay (4 seconds)
              advanceResume:      12000,            // Advance resume (12 seconds)
              thumbnailsFunction:   function(s) {       // Thumbnails function
              
                return s.replace(/_thumb\.jpg$/, '.jpg');
                
              }
            });

          </script>

      <!-- end -->      
      
      
      </div>

    </div>

                        <div  style="margin-left: 3%;width: 70%; float: left">
                            <br><br><br>
                            <div class="left" style="text-align: left; font-size: 20px; font-family: Times"><p><?php echo $row['description'];?></p><br><br><?php echo $row['longdescription'];?><br><br><b>Price:</b> &#8377;<?php echo $row['amount'];?><br><br>
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
                               <br><br><br>
                            <?php
                            if($row['video']!="")
                              {
                                $vi=$row['video'];
                                $vi=str_replace("watch?v=", "/embed/",$vi);
                                ?>
                                  <iframe width="420" height="345" src="<?php echo $vi; ?>">
                                  </iframe>
                              <?php
                            }
                            ?>
                            </div>
                            <br>
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

    

<?php
}
}
?>
</body>
</html>