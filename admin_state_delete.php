<?php
    $sid=$_GET['state_id'];
    include('conn.php');
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }
    $sql="delete from tbl_state where cc_state_id=$sid";
    $res=mysqli_query($conn,$sql);
    if($res==1)
    {
        header('location:admin_state.php');
    }
    else
    {
        echo "!Record is not delete.Please Try again.";
    }
?>