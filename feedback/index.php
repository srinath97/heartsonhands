<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Feedback Form</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../assets/ico/favicon.png">

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/work.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>

<?php
require_once('loader.php');
	function succ()
    {
        echo"
     	   <script type='text/javascript'>
            alert('Feedback submitted Succesfully!!');
            </script>"
            ;
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
    }
?>
<body id="main_body"  style="background-image: url('../images/contact.jpg'); ">
	<div class="navbar-wrapper">
    <div class="container">
		<nav class="navbar navbar-inverse navbar-static-top cl-effect-21">
			<div class="container">
				<div class="navbar-header" style="margin-left: 40%">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img src="../images/logo.png" height="50px"><a class="navbar-brand" href="../index.php"><!----> <img src="../images/banner.jpg" height="150%"></a>
				</div>

				
			</div>
        </nav>
	</div>
</div>
<br><br><br>
	<img id="top" src="top.png" alt="">
	<div id="form_container" style="opacity: 0.9">
	
		<h1><a>Feedback Form</a></h1>
		<form class="appnitro" onsubmit="return confirm1();" enctype="multipart/form-data" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
					<div class="form_description">
			<h2 style="font-size: 30px">Feedback Form</h2>
			<br>
			<p style="font-size: 14px">As a valued customer we respect your suggestions and experiences about our product.Spare us a few minutes in filling this feedback form.</p>
			<br>
			<b><p style="color: #db4437">* Required</p></b>
		</div>						
		<ul>
			<center><p id="incor" style="color: #db4437;"></p></center>
			<li id="li_1" >
				<label class="description" > Name <b style="color: #db4437;">*</b> </label>
				<div>
					<input id="element_1" name="name" class="form-username form-control" required="true" style="width:60%" type="text" maxlength="255" value=""/> 
				</div> 
			</li>
			<br>
			<li id="li_2" >
				<label class="description" > E-Mail Address <b style="color: #db4437;">*</b> </label>
				<div>
					<input id="element_1" name="email" class="form-username form-control" required="true" style="width:60%" type="email" maxlength="255" value=""/> 
				</div> 
			</li>		
			<br>
			<li id="li_8" >
				<label class="description" > Contact Number <b style="color: #db4437;">*</b> </label>
				<div>
					<input id="element_8" name="contact" class="form-username form-control" type="number" required="" style="width:60%" value=""/> 
				</div> 
			</li>
			<br>
			<li id="li_5" >
				<label class="description" > Address <b style="color: #db4437;">*</b> </label>
				<div>
					<textarea id="element_1" name="address" class="form-username form-control" required="true" style="width:60%; resize: none;" rows="5" style=""></textarea>
				</div> 
			</li>
			<br>
			<li id="li_9" >
				<label class="description" > Date Of Birth <b style="color: #db4437;">*</b> </label>
				<span>
					<input id="element_9_2" name="date" class="form-username form-control" size="3" maxlength="2" value="" type="text" required="true"> 
					<label style="margin-left: 17px">DD</label>
				</span>
				<span style="font-size: 20px; margin: 3px">
				/
				</span>
				<span>
					<input id="element_9_1" name="month" class="form-username form-control" size="3" maxlength="2" value="" type="text" required="true"> 
					<label style="margin-left: 17px">MM</label>
				</span>
				<span style="font-size: 20px; margin: 3px">
				/
				</span>
				<span>
			 		<input id="element_9_3" name="year" class="form-username form-control" size="5" maxlength="4" value="" type="text" required="true">
					<label style="margin-left: 17px">YYYY</label>
				</span>
			
				<span id="calendar_9">
					<img id="cal_img_9" style="height: 30px; width: 30px" class="datepicker" src="calendar.gif" alt="Pick a date.">	
				</span>
				<script type="text/javascript">
					Calendar.setup({
					inputField	 : "element_9_3",
					baseField    : "element_9",
					displayArea  : "calendar_9",
					button		 : "cal_img_9",
					ifFormat	 : "%B %e, %Y",
					onSelect	 : selectDate
					});
				</script>
			</li>
			<br>
			<li id="li_16" >
				<label class="description" > Gift Bought <b style="color: #db4437;">*</b> </label>
				<div>
					<input id="element_1" name="gift" class="form-username form-control" required="true" style="width:60%" type="text" maxlength="255" value=""/>
				</div>
			</li>
			<br>
			<li id="li_6" >
				<label class="description" > Person to whom the card was gifted <b style="color: #db4437;">*</b> </label>
				<div>
					<input id="element_1" name="toname" class="form-username form-control" required="true" style="width:60%" type="text" maxlength="255" value=""/> 
				</div>
			</li>
			<br>
			<li id="li_7" >
				<label class="description" > Occasion of gifting the card <b style="color: #db4437;">*</b> </label>
				<div>
					<input id="element_1" name="occasion" class="form-username form-control" required="true" style="width:60%" type="text" maxlength="255" value=""/> 
				</div>
			</li>
			<br>
			
			<li id="li_15" >
				<label class="description" > Any Comments <b style="color: #db4437;">*</b> </label>
				<div>
					<textarea id="element_1" name="comment" class="form-username form-control" required="true" style="width:60%; resize: none;" rows="5" style=""></textarea>
				</div> 
			</li>
			<br>
			<li id="li_10" >
				<label class="description" > Rate Your Experience <b style="color: #db4437;">*</b> </label>
			</li>
			<div class="cont" style="background-color: white; padding: 0px; margin: 0px; border-color: white; ">
			   <div class="stars" style="float: left">
			    
			      <input class="star star-5" id="star-5" type="radio" name="star" value="5" required=""/>
			      <label class="star star-5" for="star-5"></label>
			      <input class="star star-4" id="star-4" type="radio" name="star" value="4" required=""/>
			      <label class="star star-4" for="star-4"></label>
			      <input class="star star-3" id="star-3" type="radio" name="star" value="3" required=""/>
			      <label class="star star-3" for="star-3"></label>
			      <input class="star star-2" id="star-2" type="radio" name="star" value="2" required=""/>
			      <label class="star star-2" for="star-2"></label>
			      <input class="star star-1" id="star-1" type="radio" name="star" value="1" required="" />
			      <label class="star star-1" for="star-1"></label>
			    </form>
			  </div>
			</div>
			<br>
			<button class="btn btn-primary" name="submit" style="margin: 15px">Submit</button>
			</ul>
		</form>	
		<?php
			if(isset($_POST['submit']))
			{
				require_once('../db.php');
				$name=$email=$contact=$address=$contact=$date=$gift=$person=$occasion=$rate=$comment="";
				if(isset($_POST['name']))
					$name=trim($_POST['name']);
				if(isset($_POST['email']))
					$email=trim($_POST['email']);
				if(isset($_POST['contact']))
					$contact=trim($_POST['contact']);
				if(isset($_POST['address']))
					$address=trim($_POST['address']);
				if(isset($_POST['date']) && isset($_POST['month']) && isset($_POST['year']))
				{
					$m=trim($_POST['month']);
					if($m<10)
						$m='0'.$m;
					$d=trim($_POST['date']);
					if($d<10)
						$d='0'.$d;
					$date=trim($_POST['year']).'-'.$m.'-'.$d;
				}
				if(isset($_POST['gift']))
					$gift=$_POST['gift'];
				if(isset($_POST['toname']))
					$person=$_POST['toname'];
				if(isset($_POST['occasion']))
					$occasion=trim($_POST['occasion']);
				if(isset($_POST['star']))
					$rate=trim($_POST['star']);
				if(isset($_POST['comment']))
					$comment=trim($_POST['comment']);
				?>
                    <script>
                    var error="";
                    </script>
                <?php
				$f=0;
				//Dayal">Ranivada">Otha">Mota Khutavda Talgajarda">
				if($name=="")
				{
					?>
                    <script>
                    	error="Name cannot be empty!";
                    </script>
                    <?php
					
				}
				else if($email=="")
				{
					?>
                    <script>
                    	error="E-Mail id cannot be empty!";
                    </script>
                    <?php
				}else if($contact=="")
				{
					?>
                    <script>
                    	error="Contact cannot be empty!";
                    </script>
                    <?php
				}
				else if($address=="")
				{
					?>
                    <script>
                    	error="Address cannot be empty!";
                    </script>
                    <?php
				}
				else if($date=="")
				{
					?>
                    <script>
                    	error="Date of birth cannot be empty!";
                    </script>
                    <?php
				}
				else if($gift=="")
				{
					?>
                    <script>
                    	error="Gift bought cannot be empty!";
                    </script>
                    <?php	
				}
				else if($person=="")
				{
					?>
                    <script>
                    	error="Person to which the card was gifted cannot be empty!";
                    </script>
                    <?php
				}
				else if($person=="")
				{
					?>
                    <script>
                    	error="Occasion cannot be empty!";
                    </script>
                    <?php
				}
				else if($rate=="")
				{
					?>
                    <script>
                    	error="Rate cannot be empty!";
                    </script>
                    <?php
				}
				else if($comment=="")
				{
					?>
                    <script>
                    	error="Comments cannot be empty!";
                    </script>
                    <?php
				}
				else
				{
					$f=1;
					date_default_timezone_set('Asia/Kolkata');
            		$postdate=date('Y-m-d H:i:s');
            
					$query="INSERT INTO `feedback`(`id`, `name`, `email`, `contact`, `address`, `date`, `gift`, `person`, `occasion`, `rate`, `postdate`, `comment`) VALUES (NULL,'$name','$email','$contact','$address','$date','$gift','$person','$occasion','$rate','$postdate','$comment')";
					mysqli_query($stat,$query);
					succ();
				}
				if($f==0)
				{
                    ?>
                    <script>
                    document.getElementById("incor").innerHTML="ERROR : "+error;
                    </script>
                    <?php
				}
			}		
		?>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
	<script>

</script>
<script type="text/javascript">
		function confirm1()
		{
			if(confirm("Are you sure you want to submit the Feedback?"))
				return true;
			else
				return false;
		}
	</script>
    
</html>