<?php
    $courseid=$_GET['courseid'];
    include('conn.php');
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }    

    $sql="delete from tbl_course where cc_course_id=$courseid";
    $res=mysqli_query($conn,$sql);
    if($res==1)
    {
        header('location:admin_course.php');
    }
    else
    {
        echo "!Record is not delete.Please Try again.";
    }
?>