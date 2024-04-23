<?php
    include('conn.php');
    $msg="";
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }
    $sid=$_GET['stateid'];
    if(isset($_POST['btnsub']))
    {
        $snm=$_POST['snm'];
        $sql="update tbl_state set cc_state_name='$snm' where cc_state_id=$sid";
        $res=mysqli_query($conn,$sql);
        if($res==1)
        {
            header("location:admin_state.php");
            $msg="Record Updated Successfully";
        }
        else
        {
            $msg="Record Not Update.Please Try again";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update State</title>
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
                        <h3 align="center">Update State</h3>
                        <br>
                        <input type="text" placeholder="Enter State Name" class="form-control" required name="snm">
                        <div class="valid-feedback">Valid</div>
                        <div class="invalid-feedback">Enter State Name</div>                
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <br>
                <h5 align="center"><?php echo $msg;?></h5>
                <button type="submit" name="btnsub" class="btn btn-primary">Update</button>
                <hr>
            </div>
        </div>
    </form>
    </div>
</body>
</html>