<html lang="en">
<?php
session_start();	
//require_once('loader.php');
?>
<head>	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Hearts On Hands">
<meta name="Keywords" content="hearts on hands,Hearts On Hands,hoh creations,hohcreations,heartsonhands,greeting cards,hand made greeting cards,explosion box,occasional cards,magic cube,pop-up cards,heart collage,scrap book,layered cards,infinite cards">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- font files -->
<!--<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">-->
<!-- /font files -->
<!-- css files -->
<title>Hearts On Hands</title>

<link rel="shortcut icon" href="assets/ico/favicon.png">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/work.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<link rel="stylesheet" type="text/css" href="css/style1.css" />
</head>
<style type="text/css">
	
footer {
	background: #1b2021;
	padding: 45px 0 70px;
	color: #808080;
}
footer h3 small {
	color: #fff;
	padding-bottom: 20px;
}
footer hr {
	border-top: 1px solid #47454a;
	margin: 70px 0 0 0;
}
footer p span {
	color: #fff;
}
footer .text-center {
	padding: 40px 0;
	margin: 0;
}
footer .form-group {
	width: 90%;
}
footer button.btn-primary {
	position: relative;
	top: 10px;
}
footer button.btn-primary:focus {
	outline: none;
}

</style>

<?php
require_once('loader.php');
?>

<!-- /css files -->
<!-- js files -->
<!-- /js files -->
</head>
<body>
<!-- navigation -->
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
					<img src="images/logo.png" height="500%"><a class="navbar-brand" href=""><!----> <h1><img src="images/banner.jpg" height="120%"></h1></a>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#Fader">Home</a></li>
						<li><a href="#feature">About us</a></li>
						<li><a href="#gallery">Gallery</a></li>
						<li><a href="#testimonial">Feedback</a></li>
						<li><a href="#contact">Contact</a></li>
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
<!-- /navigation -->
<!-- banner section -->
<div id="Fader" class="fader">
	<img class="slide img-responsive" src="images/banner1.jpg" alt="w3layouts">
	<img class="slide img-responsive" src="images/banner2.jpg" alt="w3layouts">
	<img class="slide img-responsive" src="images/banner3.jpg" alt="w3layouts">
	<img class="slide img-responsive" src="images/banner4.jpg" alt="w3layouts">
    <div class="fader_controls">
		<div class="page prev" data-target="prev">&lsaquo;</div>
		<div class="page next" data-target="next">&rsaquo;</div>
		<!--<ul class="pager_list"></ul>-->
    </div>
</div>
<!-- banner section -->
<!-- features section -->
<section class="our-features" id="feature" style="background-color: #123456">
	<h3 class="text-center w3layouts w3 w3l w3ls" style="color:#abcdef; font-size: 60px;text-shadow: 3px 3px 3px #000000;">About Us</h3>
	<p class="text-center w3layouts w3 w3l w3ls" style="color:#ffffff; text-shadow: 2px 2px 2px #000000;"><b>Customised handmade greeting cards ! Bringing life to your emotions <3.</b> </p>
	<div class="container">
		<div class="row" style="color:#ffffff">
			<div class="col-lg-4 col-md-4 col-sm-6 feature-w3l" >
				<img class="img img-responsive" src="images/feature1.jpg" alt="Generic placeholder image" style="padding-left: 0px; border-radius: 50px; ">
				<h4><b style="color:#fff; text-shadow: 2px 2px 2px #000000;">Start-up Weekend</b></h4>
				<p style="background-color: rgba(0,0,0,0.8); padding: 5px; border-radius: 10px; ">We were given an opportunity  to showcase our brand in an event conducted by SASTRA's Entrepreneurship Development Wing where we stood first among other competing ideas.</p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4 col-md-4 col-sm-6 feature-w3l">
				<img class="img img-responsive" src="images/feature2.jpg" alt="Generic placeholder image" style="padding-left: 0px; border-radius: 50px; ">
				<h4><b style="color:#fff; text-shadow: 2px 2px 2px #000000;">Workshop</b></h4>
				<p style="background-color: rgba(0,0,0,0.8); padding: 5px; border-radius: 10px; ">Conducted a workshop to share our card making expertise with college students. Over 150 enthusiastic participants turned up for the workshop and learned the secret behind custom gifts.</p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4 col-md-4 col-sm-6 feature-w3l f3">
				<img class="img img-responsive" src="images/feature3.jpg" alt="Generic placeholder image" style="padding-left: 0px; border-radius: 50px; ">
				<h4><b style="color:#fff; text-shadow: 2px 2px 2px #000000;">Farewell cards</b></h4>
				<p style="background-color: rgba(0,0,0,0.8); padding: 5px; border-radius: 10px; ">Custom designed 160 farewell cards for our college seniors as our first huge order and the results were exhilarating </p>
			</div><!-- /.col-lg-4 -->
		</div><!-- /.row -->
	</div>	
</section>
<!-- /features section -->
<!-- work section -->
<!-- /work section -->
<!-- services section -->
<!-- gallery section -->
<section class="our-gallery" id="gallery">
	<h1 class="text-center" style="color:#123456; font-size: 60px;text-shadow: 3px 3px #000000;">Our Gallery</h1>
	<br><br>
	<div class="container">
		<div>
			<a href="images/gallery1.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"><img src="images/gallery1.jpg" alt="" /></a>
			<a href="images/gallery2.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery2.jpg" alt="" /></a>
			<a href="images/gallery3.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery3.jpg" alt="" /></a>
			<a href="images/gallery4.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery4.jpg" alt="" /></a>
			<a href="images/gallery5.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery5.jpg" alt="" /></a>
			<a href="images/gallery6.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery6.jpg" alt="" /></a>
			<a href="images/gallery7.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery7.jpg" alt="" /></a>
			<a href="images/gallery8.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery8.jpg" alt="" /></a>
			<a href="images/gallery9.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery9.jpg" alt="" /></a>
			<a href="images/gallery10.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery10.jpg" alt="" /></a>
			<a href="images/gallery11.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery11.jpg" alt="" /></a>
			<a href="images/gallery12.jpg" class="lightninBox" data-lb-group="1" style="width:260px;height: 165px"; ><img src="images/gallery12.jpg" alt="" /></a>
		</div>
	</div>
</section>
<!-- /gallery section -->
<!-- testimonial section -->
<section class="our-testimonials" id="testimonial" style="background-color: #123456;">
	<h3 class="text-center" style="color:#abcdef; font-size: 60px;text-shadow: 3px 3px 3px #000000;">Feedback from Customers</h3>
	<p class="text-center" style="color: #fff16a"><b>Our first few customers were very friendly and helpfull with their feedback, without them it wouldn't have been possible to move forward with risky new design choices .</b></p>
	<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img class="first-slide img-circle img-responsive" src="images/test1.jpg" height="100%" alt="First slide">
					<h4>Sailesh Dheep</h4>
					<p>A big shoutout to the team #heartsonhands.We ordered return gift for conducting farewell for our seniors. Within a short span of time these ppl delivered the cards. A big thank you for the people who had invested their time doing the cards. It was really awesome. People loved it. .</p>
				</div>
				<div class="item">
					<img class="second-slide img-circle img-responsive" src="images/test2.jpg" alt="Second slide">
					<h4>Surampudi Gowtham</h4>
					<p>Awesome gifts for ur special ones on a special occasion.. These guys make them with utmost care and a lot of hardwork. So want to gift some one special try out this one..</p>
				</div>
				<div class="item">
					<img class="third-slide img-circle img-responsive" src="images/test3.jpg" alt="Third slide">
					<h4>Vignesh Waran</h4>
					<p>A girl of courage, knowledge, bravery, hard work, spirit, love and many to say about u sanju.. My hearty wishes to all your wishes.. Keep going. #sanchitaa CEO.</p>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div><!-- /.carousel -->
	</div>
</section>
<!-- /testimonial section -->

<!-- contact section -->
<section class="our-contacts" id="contact">
	<h3 class="text-center" style="color:#abcdef; font-size: 60px;text-shadow: 4px 4px 4px #000010;">Contacts</h3>
		<div class="box" style="margin-left: 13%">
			<div class="f"><img src="images/contact1.jpg" class="contactlist"></div>
			<div class="b"><b>Sanchitaa</b> <br><div style="font-size: 15px">( CEO and Founder ) <br> <br>9442676085<br> <br>sanchitaaganesh31@gmail.com<br><br><a href="https://www.facebook.com/heartsonhands35/"><img src="images/F_icon.png" height="30px"></a></div></div>
		</div>
		<div class="box" style="margin-left: 10%">
			<div class="f"><img src="images/contact2.jpg" class="contactlist"></div>
			<div class="b"><b>Thirumaran</b> <br><div style="font-size: 15px">( Co-Founder ) <br> <br>9600180704<br> <br>thirum110@gmail.com<br><br><a href="https://www.facebook.com/roadside.roameo.7"><img src="images/F_icon.png" height="30px"></a></div></div>
		</div>
		<div class="box" style="margin-left: 10%">
			<div class="f"><img src="images/contact3.jpg" class="contactlist"></div>
			<div class="b"><b>Mounika</b> <br><div style="font-size: 15px">( Co-Founder ) <br><br>9440042444<br><br> mounikachadalada@gmail.com<br><br><a href="https://www.facebook.com/mounika.chadalada"><img src="images/F_icon.png" height="30px"></a></div></div>
		</div>
		<div class="box" style="margin-left: 41%">
			<div class="f"><img src="images/contact4.jpg" class="contactlist"></div>
			<div class="b"><b>Srinath</b> <br><div style="font-size: 15px">( Web Developer ) <br> <br>9952047354<br> <br>srinath.pattabi@gmail.com<br><br><a href="https://www.facebook.com/srinath97"><img src="images/F_icon.png" height="30px"></a></div></div>
		</div>
</section>
<footer style="height: 20px">
  <div class="container" >
    
    <div style="margin-top: -40px" class="text-center">&copy; Copyright Hearts on Hands. All Rights Reserved.</div>
  </div>
</footer>

<!-- /contact section -->
<!-- footer section -->
<!-- /footer section -->
<!-- back to top -->
<a href="#0" class="cd-top">Top</a>
<!-- /back to top -->
<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<!-- js for gallery section -->
<script src="js/jQuery.lightninBox.js"></script>
<script type="text/javascript">
	$(".lightninBox").lightninBox();
</script>
<!-- /js for gallery section -->
<!-- js for banner section -->
<script src="js/prefixfree.min.js"></script>
 <script src="js/index.js"></script>
<!-- /js for banner section -->
<!-- js for smooth navigation -->
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

   // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if
  });
})
</script>
<!-- /js for smooth navigation -->
<!-- js for back to top -->
<script src="js/main.js"></script>
<!-- /js for back to top -->
<!-- /js files -->
</body>
</html>



