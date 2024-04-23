<?php
    $x="";
    include('conn.php');
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }    
    if(isset($_POST['btnsub']))
    {
        $cimg=$_FILES['cimg']['name'];
        $tmp_fnm=$_FILES['cimg']['tmp_name'];    
        $target="images/".basename($_FILES['cimg']['name']);
        move_uploaded_file($tmp_fnm,$target);
        $cnm=$_POST['cnm'];
        $desc=$_POST['desc'];
        $cmbdept=$_POST['cmbdept'];
        $sql2="insert into tbl_course(cc_course_name,cc_course_description,cc_dept_id,cc_course_img)values('".$cnm."','".$desc."','".$cmbdept."','".$cimg."')";
        $res2=mysqli_query($conn,$sql2);
        if($res2==1)
        {
            $x="Record Inserted Successfully";
        }
        else
        {
            $x="Record is not inserted";
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
      /* background-image: url('temp7.jpg'); */
      background-color: #378CE7;
      background-size: cover;
      background-repeat: no-repeat;
    }
    .table-hover tbody tr:hover td{
  background-color: black;
  color:white;
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

    <form method="post" class="was-validated" enctype="multipart/form-data">
        <br>
        <br>
        <div class="card bg-white p-3 m-5">
            <br>
        <div class="container" align="center">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h3 align="center">Insert New Course</h3>
                    <hr>
                    <br>
                    <input type="text" placeholder="Enter New Course" class="form-control" required name="cnm">
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Enter Course Name</div>                
                    <br>
                    <textarea name="desc" rows=4 class="form-control" pattern="[A-Za-z0-9'\.\-\s\,]{10,600}" required></textarea>
                            <div class="invalid-feedback">Enter Course Description</div>
                            <div class="valid-feedback">Valid!</div>
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
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Select the Department</div>
                    <br>
                    <input type="file" name="cimg" class="form-control" required>
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Select Course Image</div>
                    
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <h5 align="center"><?php
            echo $x;?></h5>
            <button type="submit" name="btnsub" class="btn btn-primary">Insert</button>
            <hr>
        </div>

        </div>
        <br>
        <br>
        <div class="card bg-white p-3 m-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
        <table class="table table-stripped table-hover">
            <thead align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>DepartmentID</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php
                    include('conn.php');
                    $sql="select * from tbl_course";
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($res))
                    {
                ?>
                <tr align="center">
                    <td><?php echo $row['cc_course_id']; ?></td>
                    <td><?php echo $row['cc_course_name']; ?></td>
                    <td><?php echo $row['cc_course_description'];?></td>
                    <td><?php echo $row['cc_dept_id']; ?></td>
                    <td><?php echo $row['cc_course_img']; ?></td>
                    <td>
                        <a class="btn btn-success" href="admin_course_update.php?courseid=<?php echo $row['cc_course_id']; ?>"><i class="fa fa-pencil"></i></a>
                        <hr>
                        <a class="btn btn-danger" href="admin_course_delete.php?courseid=<?php echo $row['cc_course_id']; ?>"><i class="fa fa-trash"></i></a>
                    </td>    
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
                </div>
        </div>
                </div>
        </div>
    </form>
</div>
</body>
</html>