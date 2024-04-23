<?php
    $cid=$_GET['cityid'];
    include('conn.php');
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }
    $sql="delete from tbl_city where cc_city_id=$cid";
    $res=mysqli_query($conn,$sql);
    if($res==1)
    {
        header('location:admin_city.php');
    }
    else
    {
        echo "!Record is not delete.Please Try again.";
    }
?>