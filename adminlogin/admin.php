<?php       
    session_start();
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
    ?>
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
                    <li class="active">
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Feedbacks</a>
                    </li>
                    <li >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-gift"></i> Items <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
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
                    <li>
                        <a href="vieworder.php"><i class="fa fa-fw fa-dashboard"></i> Orders</a>
                    </li>  
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
        <h1> Feedbacks</h1>
            <br>
            <div class="container-fluid" >
                <table class="table table-bordered table-hover table-striped" style="width: 95%;">
            <tbody>
                <tr>
                    <td><b>S.No</b></td>
                    <td><b>Name</b></td>
                    <td><b>Posted On</b></td>
                    <td><b>Comments</b></td>
                    <td><b>Ratings</b></td>
                    
                </tr>
                <?php
                    require_once('../db.php');
                    $query="SELECT * from feedback ORDER BY id DESC";
                    $result=mysqli_query($stat,$query);
                    $i=1;
                    while($rows=mysqli_fetch_array($result))
                    {   
                        ?>  <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $rows['name'] ?></td>
                                <td><?php 
                                $date=$rows['postdate'];
                                    $date=new dateTime($date);
                                    echo $date=$date->format('d M Y');

                                 ?></td>
                                <td><?php echo $rows['comment'] ?></td>
                                <td><?php 
                                    for($j=0;$j<$rows['rate'];$j++)
                                    {?>
                                        <img src="../images/star.jpg" width="20px">
                                    <?php
                                    }
                                 ?><a style="float: right" href = "listpeople.php?id=<?php echo $rows['id'];?>">View Details</a></td>
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
    }?>
</html>
    