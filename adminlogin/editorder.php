<?php       
    session_start();
    function succ()
    {
        ?>
        <script type="text/javascript">
            alert("Item Successfully Changed!!")
        </script>
        <?php
         echo "<meta http-equiv=\"refresh\" content=\"0;URL=vieworder.php\">";
    }
    if(!isset($_SESSION['admin']))
    {
        header("refresh:0,url=index.php");
    }
    else
    {

        $name='';
        $id=$_SESSION['admin'];
        require_once('../db.php');
        $query="SELECT * from admin WHERE id='$id'";
        $result=mysqli_query($stat,$query); 
        if($rows=mysqli_fetch_array($result))
        {
            $name=$rows['name'];
            $oid=$_GET['id'];
    ?>
    <?php
            $query1="SELECT * from orders where id='$oid'";
            $result1=mysqli_query($stat,$query1);
            if($ro=mysqli_fetch_array($result1))
            {?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Interface</title>
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../assets/ico/favicon.png">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin Interface</a>
            </div>
            <?php
                require_once('topmenu.php');
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Feedbacks</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-gift"></i> Items <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li >
                                <a href="additem.php"><i class="fa fa-fw fa-plus"></i> Add Item</a>
                            </li>
                            <li>
                                <a href="edititem.php"><i class="fa fa-fw fa-edit"></i> Edit Item</a>
                            </li>
                            <li>
                                <a href="deleteitem.php"><i class="fa fa-fw fa-minus"></i> Delete Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="vieworder.php"><i class="fa fa-fw fa-dashboard"></i> Orders</a>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
        <h1> <i class="fa fa-fw fa-gift"></i>Order No:<?php echo $oid; ?></h1>
            <div class="container-fluid" >
        <div class="row">
                    <div class="col-lg-7">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <center><p id="incor1"></p></center>
                                    <form method="post" enctype="multipart/form-data" action="">
                                    <tr>
                                        <td><strong>Paid</strong></td>
                                        <td>
                                        <?php
                                            if($ro['paid']==1)
                                            {
                                                ?><input name="paid" class="" type="radio" autocomplete="off" checked="" value="1"> Yes<br>
                                                <input name="paid" class="" type="radio" autocomplete="off" value="0"> No
                                                <?php
                                            }
                                            else
                                            {
                                                ?><input name="paid" class="" type="radio" autocomplete="off" value="1"> Yes<br>
                                                <input name="paid" class="" type="radio" autocomplete="off" checked="" value="0"> No
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status</strong></td>
                                        <td>
                                        <input name="status" class="" type="radio" autocomplete="off" value="1" <?php
                                            if($ro['status']==1)
                                            {
                                                ?> checked="" <?php 
                                            }
                                            else
                                            {}
                                         ?>
                                         >Order Recieved
                                         <br>
                                         <input name="status" class="" type="radio" autocomplete="off" value="2" <?php
                                            if($ro['status']==2)
                                            {
                                                ?> checked="" <?php 
                                            }
                                            else
                                            {}
                                         ?>
                                         >Under Process
                                         <br>
                                         <input name="status" class="" type="radio" autocomplete="off" value="3" <?php
                                            if($ro['status']==3)
                                            {
                                                ?> checked="" <?php 
                                            }
                                            else
                                            {}
                                         ?>
                                         >Dispatched
                                         <br>
                                         <input name="status" class="" type="radio" autocomplete="off" value="4" <?php
                                            if($ro['status']==4)
                                            {
                                                ?> checked="" <?php 
                                            }
                                            else
                                            {}
                                         ?>
                                         >Delivered
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            
                                <button name="submit1" class="btn btn-success" >Submit</button>
                                <?php  
                                    if(isset($_POST['submit1']))
                                    {
                                        require_once('../db.php');
                                        $count=5;
                                        $f=1;
                                        $paid=mysqli_real_escape_string($stat,$_POST['paid']);
                                        $status=$_POST['status'];
                                        if($paid==0||$paid==1 && $status>=1&&$status<=4)
                                        {
                                            $query5="UPDATE `orders` SET paid='$paid', status='$status' WHERE id = '$oid'";
                                            mysqli_query($stat,$query5);
                                            succ();
                                        }
                                    }
                                ?>
                            </form>
                            
                        </div>
                    </div>
                
            <!-- /.container-fluid -->
</div>
<br>
    
            <table class="table table-bordered table-hover table-striped" style="width: 95%;">
            
                <tr><td><b>Customer Name</b></td><td>
                    <?php
                    $cid=$ro['custid'];
                    $query2="SELECT * from Customer where id='$cid'";
                    $result2=mysqli_query($stat,$query1);
                    if($ro2=mysqli_fetch_array($result2))
                    {
                        echo $ro2['name'];
                    }
                    ?>
                </td></tr>
                <tr><td><b>Name</b></td><td><?php echo $ro['name']?></td></tr>
                <tr><td><b>Address</b></td><td><?php echo $ro['address']?></td></tr>
                <tr><td><b>E-Mail</b></td><td><?php echo $ro['email']?></td></tr>
                <tr><td><b>Contact No</b></td><td><?php echo $ro['phone']?></td></tr>
                <tr><td><b>Images</b></td><td><a href="../../<?php echo $ro['url']?>"><?php echo $ro['url']?></a></td></tr>
                <tr><td><b>Payment ID</b></td><td><?php echo $ro['payment_id']?></td></tr>
                <tr><td><b>Status</b></td><td><?php 
                        if($ro['status']==1)
                            echo "Order Received";
                        else if($ro['status']==2)
                          echo "Under Process";
                        else if($ro['status']==3)
                          echo "Dispatched";
                        else if($ro['status']==1)
                          echo "Delivered";?></td></tr>
                <tr><td><b>Paid</b></td><td>

                <?php 
                if($ro['paid']==1)
                    echo "Yes";
                else
                    echo "No";
            ?>
                    
                </td></tr>
            
            </table>
            </div>
            <h1> <i class="fa fa-fw fa-gift"></i>Order List</h1>
            <div class="container-fluid" >
                <table class="table table-bordered table-hover table-striped" style="width: 95%;">
            <tbody>
                <tr>
                    <td><b>S.No</b></td>
                    <td><b>Item ID</b></td>
                    <td><b>Item Name</b></td>
                    <td><b>Quantity</b></td>
                    
                </tr>
                <?php
                    require_once('../db.php');
                    $query="SELECT * from order_list where order_id='$oid'";
                    $result=mysqli_query($stat,$query);
                    $i=1;
                    while($rows=mysqli_fetch_array($result))
                    {   
                        ?>  <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $rows['item_id'] ?></td>
                                <td><?php 
                                    $query3="SELECT * from shop where id='".$rows['item_id']."'";
                                    $result3=mysqli_query($stat,$query3);
                                    if($rows3=mysqli_fetch_array($result3))
                                    {
                                        echo $rows3['title'];
                                    }
                    

                                 ?></td>
                                <td><?php echo $rows['quantity'] ?></td>
                            </tr>
                            <?php    
                            $i++;
                    }
                    ?>
            </tbody>
        </table>
            </div>
            <!-- /.container-fluid -->

        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>
<?php 
            }
            else
            {
                header("refresh:0,url=index.php");
            }    
        }
        else
        {
            header("refresh:0,url=index.php");
        }
    }?>
</html>
    