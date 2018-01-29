<?php       
    session_start();
    function succ()
    {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=deleteitem.php\">";
        ?>
        <script type="text/javascript">
            alert("Item Successfully deleted!!")
        </script>
        <?php
    }
    if(!isset($_SESSION['admin']))
    {
        header("refresh:0,url=index.php");
    }
    else
    {
        if(isset($_GET['id']))
        {
            $name='';
            $id=$_SESSION['admin'];
            require_once('../db.php');
            if(isset($_GET['id']))
            {
                $item=$_GET['id'];
                $query1="SELECT * from shop WHERE id='$item'";
                $result1=mysqli_query($stat,$query1); 
                if($rows1=mysqli_fetch_array($result1))
                {
                    for($i=1;$i<=5;$i++)
                    {
                        if($rows1['image'.$i]!="")
                        {
                            $im=$rows1['image'.$i];
                            unlink("../images/shop/$im");
                        }
                    }
                    $query2="DELETE from shop WHERE id='$item'";
                    $result2=mysqli_query($stat,$query2); 
                    succ();
                }
            }
        }
        else
        {
            header("refresh:0,url=index.php");
        }
    }
    ?>
</html>
