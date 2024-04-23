<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }

    $cid=$_GET['cityid'];
    $msg="";
    if(isset($_POST['btnsub']))
    {
        $cnm=$_POST['cnm'];
        $cmbstate=$_POST['cmbstate'];
        $sql="update tbl_city set cc_city_name='$cnm', cc_state_id=$cmbstate where cc_city_id=$cid";
        $res=mysqli_query($conn,$sql);
        if($res==1)
        {
            header("location:admin_city.php");
            $msg="Record Updated Successfully";
        }
        else
        {
            $msg="Record is not update.Please Try Again";
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
                        <h3 align="center">Update City</h3>
                        <hr>
                        <br>
                        <input type="text" placeholder="Enter City Name" class="form-control" required name="cnm">
                        <div class="valid-feedback">Valid</div>
                        <div class="invalid-feedback">Enter City Name</div>                
                        <br>
                        <select class="form-select" id="cmbstate" name="cmbstate" required>
                            <option disabled value="" selected>Select State</option>
                            <?php
                                $sql10="select * from tbl_state";
                                $res10=mysqli_query($conn,$sql10);
                                while($row10=mysqli_fetch_assoc($res10))
                                {
                            ?>
                            <option value="<?php echo $row10['cc_state_id'];?>"><?php echo $row10['cc_state_name'];?></option>
                            <?php
                                }        
                            ?>
                        </select>
                        <div class="valid-feedback">Valid</div>
                        <div class="invalid-feedback">Select the state from below</div>
                    
                    </div>
                    <div class="col-md-4"></div>
                </div>
            <br>
            <h5>
            <?php
                echo $msg;
            ?>
            </h5>
            <br>
            <button type="submit" name="btnsub" class="btn btn-primary">Update</button>
            <hr>
            </div>
        </div>    
    </form>
</div>
</body>
</html>