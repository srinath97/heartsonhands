<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
<title>HOH-Login/Signup</title>
<link rel="shortcut icon" href="assets/ico/favicon.png">

<?php
	function succ()
    {
        echo"
            <script type='text/javascript'>
            document.getElementById('cor').innerHTML='Account Registered succesfully ! ' ;
            </script>"
            ;
    }
    session_start();
	if(isset($_SESSION['users']))
    {
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
    }
    else
    {
    	require_once("loader.php");
    	if(isset($_POST['name'])) 
	        $name=$_POST['name'];
	    else
	        $name="";
	    if(isset($_POST['email'])) 
	        $email=$_POST['email'];
	    else
	        $email="";
	    if(isset($_POST['email1'])) 
	        $email1=$_POST['email1'];
	    else
	        $email1="";
	    if(isset($_POST['contact'])) 
	        $contact=$_POST['contact'];
	    else
	        $contact="";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Hearts On Hands">
<meta name="Keywords" content="hearts on hands,Hearts On Hands,hoh creations,hohcreations,heartsonhands,greeting cards,hand made greeting cards,explosion box,occasional cards,magic cube,pop-up cards,heart collage,scrap book,layered cards,infinite cards">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- /font files -->
<!-- css files -->
<link href="css/login-font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/loginstyle.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css files -->
</head>
<body>
<h1 class="header-w3ls"><a href="index.php" style="margin:20px">Hearts On Hands</a></h1>
<div class="signup-w3ls">	
	<div class="signup-agile2">
        <h2>Login</h2>
		<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="form-control">
                <center><p id="incor1" style="color:red;"></p></center>
		    </div>
		    <br>
		    <div class="form-control">
				<input type="text" name="email1" class="content" placeholder="E-Mail" required="" value="<?php echo $email1; ?>">
				<div class="clear"></div>
			</div>
			<br>
			<div class="form-control">
				<input type="password" name="password" class="content" placeholder="Password" required="" >
				<div class="clear"></div>
			</div>
			<br>
			<div class="form-control">
				<a href="">Forgot Password?</a><br><br>
			</div>
			<div class="form-control">
					<input type="submit" name="login" class="register" value="Login">
			</div>
			<div class="clear"></div>
		</form>
		<?php
			$f=1;
			require_once("db.php");
			if(isset($_POST['login']))
			{
				if(isset($_POST['email1'])) 
                    $email1=mysqli_real_escape_string($stat,$_POST['email1']);
                else
                {
                    $f=0;
                    ?>  
                    <script>
                        var msg="E-Mail ID cannot be empty!!";
                    </script>
                    <?php
                }
				if(isset($_POST['password'])) 
	                $password=mysqli_real_escape_string($stat,$_POST['password']);
	            else
	            {
	                $f=0;
	                ?>  
	                <script>
	                    var msg="Password cannot be empty!!";
	                </script>
	                <?php
	            }
	            if($f==1)
		        {
		            $query3="SELECT * FROM customer where email='$email1';";
		            $result3=mysqli_query($stat,$query3);
		            if(mysqli_num_rows($result3)==1 && $r=mysqli_fetch_array($result3))
		            {
		                if(crypt($password,$r['password'])==$r['password'])
		                {
		                    $_SESSION['users']=$r['id'];
		                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
		                }
		                else
		                {
		                    $f=0;
		                    ?>
		                    <script>
		                        var msg="Username or Password is incorrect !! ";
		                    </script>
		                    <?php
		                }
		            }
		            else
		            {
		                $f=0;
		                ?>
		                <script>
		                    var msg="Username or Pasword is incorrect !! ";
		                </script>
		                <?php
		            }   
		        }
		        if($f==0)
	            {?>
	                <script>
	                document.getElementById("incor1").innerHTML="ERROR : "+msg ;
	                </script>
	                <?php
	            }
		    }
		?>
	</div>
	<div class="signup-agile1">
        <h2>Register</h2>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="form-control">
                <center><p id="incor" style="color:red;"></p></center>
		    </div>
		    <br>
		    <div class="form-group">
                <center><p id="cor" style="color:green;"></p></center>
            </div>
            <br>
			<div class="form-control"> 
				<input type="text"  class="content" name="name" placeholder="Name" title="Please enter your First Name" required="" value="<?php echo $name?>">
			</div>
			<br>
			<div class="form-control">	
				<input type="email"  class="content" name="email" placeholder="mail@example.com" title="Please enter a valid email" required="" value="<?php echo $email?>">
			</div><br>
			<div class="form-control">	
				<input type="number"  class="content" name="contact" placeholder="Contact Number" required="" value="<?php echo $contact?>">
			</div><br>
			<div class="form-control">	
				<input type="password" class="lock content" name="password1" placeholder="Password" id="password1" required="">
			</div><br>
			<div class="form-control">	
				<input type="password" class="lock content" name="password2" placeholder="Confirm Password" id="password2" required="">
			</div>	<br>													
			<input name="register" type="submit" class="register" value="Register">
		</form>
		<script type="text/javascript">
			window.onload = function () {
				document.getElementById("password1").onchange = validatePassword;
				document.getElementById("password2").onchange = validatePassword;
			}
			function validatePassword(){
				var pass2=document.getElementById("password2").value;
				var pass1=document.getElementById("password1").value;
				if(pass1!=pass2)
					document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				else
					document.getElementById("password2").setCustomValidity('');	 
					//empty string means no validation error
			}
		</script>
		<?php
			if(isset($_POST['register']))
			{
				$f=1;
                require_once("db.php");
                if(isset($_POST['name'])) 
                    $name=mysqli_real_escape_string($stat,$_POST['name']);
                else
                {
                    $f=0;
                    ?>  
                    <script>
                        var msg="Name cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['email'])) 
                    $email=mysqli_real_escape_string($stat,$_POST['email']);
                else
                {
                    $f=0;
                    ?>  
                    <script>
                        var msg="E-Mail cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['contact'])) 
                    $contact=mysqli_real_escape_string($stat,$_POST['contact']);
                else
                {
                    $f=0;
                    ?>  
                    <script>
                        var msg="Contact Number cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['password1'])) 
                    $password=mysqli_real_escape_string($stat,$_POST['password1']);
                else
                {
                    $f=0;
                    ?>  
                    <script>
                        var msg="Password cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['password2'])) 
                    $password1=mysqli_real_escape_string($stat,$_POST['password2']);
                else
                {
                    $f=0;
                    ?>  
                    <script>
                        var msg="Confirm Password cannot be empty!!";
                    </script>
                    <?php
                }
              	if($f==1)
                {
                    if($password!=$password1)
                    {
                        $f=0;
                        ?>  
                        <script>
                            var msg="Password and Confirm Password are different!!";
                        </script>
                        <?php                                    
                    }
                    else
                    {
                        require_once("db.php");
                        $q="SELECT * from customer WHERE email='$email';";
                        $r=mysqli_query($stat,$q);
                        $re=mysqli_fetch_array($r);
                        if($re==NULL)
                        {
                            $blowfish_salt=bin2hex(openssl_random_pseudo_bytes(22));
                            $hash=crypt($password,"$2a$12$".$blowfish_salt);
                            $q="INSERT INTO `customer` (`id`, `name`, `email`, `password`, `contact`) VALUES (NULL,'$name','$email','$hash','$contact');";
                            $r=mysqli_query($stat,$q);
                            succ();
                        }
                        else
                        {
                            $f=0;
                            ?>  
                            <script>
                                var msg="E-Mail ID already exist !";
                            </script>
                            <?php
                        }
                    }
                }
                
                if($f==0)
                {?>
                    <script>
                    document.getElementById("incor").innerHTML="ERROR : "+msg ;
                    </script>
                    <?php
                }
            }
        ?>
	</div>
</div>	

<p class="copyright">© 2016 HOH. All Rights Reserved | Design by <a href="" >KS</a></p>
</body>
<?php
}
?>
</html>