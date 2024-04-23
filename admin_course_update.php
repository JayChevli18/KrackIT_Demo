<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }    
    $msg="";
    $cimg="";
    $x="";
    $cid=$_GET['courseid'];
    if(isset($_POST['btnsub']))
    {
        $cnm=$_POST['cnm'];
        $desc=$_POST['desc'];
        $cmbdept=$_POST['cmbdept'];
        $cimg=$_FILES['cimg']['name'];
        $tmp_fnm=$_FILES['cimg']['tmp_name'];    
        $target="images/".basename($_FILES['cimg']['name']);
        move_uploaded_file($tmp_fnm,$target);
        $sql="update tbl_course set cc_course_name='$cnm', cc_course_description='$desc', cc_dept_id=$cmbdept, cc_course_img='$cimg' where cc_course_id=$cid";
        $res=mysqli_query($conn,$sql);
        if($res==1)
        {
            header("location:admin_course.php");
            $x="Record Updated Successfully";
        }
        else
        {
            $x="Record is not updated.Please try again";
        }
    }
    $sql2="select * from tbl_course where cc_course_id=$cid";
    $res2=mysqli_query($conn,$sql2);
    while($row=mysqli_fetch_assoc($res2))
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .clri {
      background-color: #378CE7;
      background-size: cover;
      background-repeat: no-repeat;
    }
    </style>

</head>
<body class="clri">
<div class="row">
    <div class="col-md-2">
        <?php
            include('admin_nav_bar.php');
        ?>
    </div>
    <div class="col-md-10">

    <form method="post" enctype="multipart/form-data" class="was-validated">
        <br>
        <br>
        <div class="card bg-white p-3 m-5">
            <br>
        <div class="container" align="center">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h3 align="center">Update Course</h3>
                    <hr>
                    <br>
                    <input type="text" placeholder="Enter Course" class="form-control" required name="cnm" value="<?php echo $row['cc_course_name'];?>">
                    <div class="invalid-feedback">Enter Course Name</div>                
                    <br>
                    <textarea name="desc" rows=4 class="form-control" pattern="[A-Za-z0-9'\.\-\s\,]{10,600}" required><?php echo $row['cc_course_description'];?></textarea>
                            <div class="invalid-feedback">Enter Course Description</div>
                    <br>
                    <select class="form-select" id="cmbdept" name="cmbdept" required>
                        <option disabled value="" selected>Select Department</option>
                        <?php
                            $sql10="select * from tbl_dept";
                            $res10=mysqli_query($conn,$sql10);
                            while($row10=mysqli_fetch_assoc($res10))
                            {
                        ?>
                        <option value="<?php echo $row10['cc_dept_id'];?>"><?php echo $row10['cc_dept_name'];?></option>
                        <?php
                            }        
                        ?>
                    </select>
                    <div class="invalid-feedback">Select the Department</div>
                    <br>
                    <input type="file" name="cimg" class="form-control" required>
                    <div class="invalid-feedback">Select Course Image</div>
           
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <h5 align="center"><?php
            echo $x;?></h5>
            <button type="submit" name="btnsub" class="btn btn-primary">Update</button>
            <hr>
        </div>

        </div>
</form>
</div>
</body>
</html>
<?php
    }
?>