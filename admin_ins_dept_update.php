<?php
    include('conn.php');
    $msg="";
    $deptid=$_GET['deptid'];
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }
    if(isset($_POST['btnsub']))
    {
        $deptnm=$_POST['deptnm'];
        $sql="update tbl_dept set cc_dept_name='$deptnm' where cc_dept_id=$deptid";
        $res=mysqli_query($conn,$sql);
        if($res==1)
        {
            header("location:admin_ins_dept.php");
            $msg="Record updated successfully";
        }
        else
        {
            $msg="Record is not updated. Please try again";
        }
    
    }
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

    <form method="post" class="was-validated">
    <br>
    <br>
    <div class="card bg-white p-3 m-5">
    
    <br>
    <div class="container" align="center">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h3 align="center">Update Department</h3>
                    <br>
                    <?php
                        $sql1="select * from tbl_dept where cc_dept_id=$deptid";
                        $res1=mysqli_query($conn,$sql1);
                        while($row=mysqli_fetch_assoc($res1))
                        {
                    ?>                    
                    <input type="text" value="<?php echo $row['cc_dept_name'];?>" placeholder="Enter Department" class="form-control" required name="deptnm">
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Enter Department Name</div>                
                            <?php
                        }
                            ?>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <h5><?php echo $msg?></h5>
            <button type="submit" name="btnsub" class="btn btn-primary">Update</button>
            <hr>
        </div>
        </div>
</form>
</div>
</body>
</html>