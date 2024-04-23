<?php
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }
    $deptid=$_GET['deptid'];
    include('conn.php');
    $sql="delete from tbl_dept where cc_dept_id=$deptid";
    $res=mysqli_query($conn,$sql);
    if($res==1)
    {
        header('location:admin_ins_dept.php');
    }
    else
    {
        echo "!Record is not delete.Please Try again.";
    }
?>