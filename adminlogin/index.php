<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
<title>Admin-Login</title>
<?php
    session_start();
	if(isset($_SESSION['admin']))
    {
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">";
    }
    else
    {
    	require_once("loader.php");
    	if(isset($_POST['username'])) 
	        $username=$_POST['username'];
	    else
	        $username="";
	    
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- /font files -->
<!-- css files -->
<link href="../css/login-font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/loginstyle.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css files -->
</head>
<body>
<h1 class="header-w3ls">Admin Login </h1>
<center>
<div style="margin: 150px;width:40%">	
	
    	<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="form-control">
                <center><p id="incor1" style="color:red;"></p></center>
		    </div>
		    <br>
		    <div class="form-control">
				<input type="text" name="username" class="content" placeholder="Username" required=""  value="<?php echo $username; ?>">
				<div class="clear"></div>
			</div>
			<br>
			<div class="form-control">
				<input type="password" name="password" class="content" placeholder="Password" required="" >
				<div class="clear"></div>
			</div>
			<br>
			<div class="form-control">
					<input type="submit" name="login" class="register" value="Login">
			</div>
			<div class="clear"></div>
		</form>
		<?php
			$f=1;
			require_once("../db.php");
			if(isset($_POST['login']))
			{
				if(isset($_POST['username'])) 
                    $username=mysqli_real_escape_string($stat,$_POST['username']);
                else
                {
                    $f=0;
                    ?>  
                    <script>
                        var msg="Username cannot be empty!!";
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
		            $query3="SELECT * FROM admin where name='$username';";
		            $result3=mysqli_query($stat,$query3);
		            if(mysqli_num_rows($result3)==1 && $r=mysqli_fetch_array($result3))
		            {
		                if(crypt($password,$r['password'])==$r['password'])
		                {
		                    $_SESSION['admin']=$r['id'];
		                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">";
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

</body>
<?php
}
?>
</html>