<?php
    include('conn.php');
    $i=0;
    $msg="";
    session_start();
    if(!isset($_SESSION['alumni']))
    {
        header("location:login.php");
    }
    $alumni=$_SESSION['alumni'];
    if(isset($_POST['btnsub']))
    {
        $almrev=$_POST['almrev'];
        $sql="update tbl_alumni set alumni_review='$almrev' where alumni_email_id='$alumni'";
        $res=mysqli_query($conn,$sql);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() 
        {
            $('#tblstate').dataTable();
        });
    </script> -->
    <style>
    .clri {
      background-image: url('temp7.jpg');
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
            include('alumni_nav_bar.php');
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h3>Add Review</h3>
                    <br>
                    <textarea name="almrev" rows=4 class="form-control"  required></textarea>
                    <div class="invalid-feedback">Enter your Review about your Institute!</div>
                    <div class="valid-feedback">Valid!</div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <br>
            <button type="submit" name="btnsub" class="btn btn-primary">ADD</button>
            <hr>
        </div>
    </div>
    <br>
    <br>
    <div class="card bg-white p-3 m-5">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h3>Your Review</h3>
                    <br><hr>
                        <?php
                            include('conn.php');
                            $sql="select * from tbl_alumni where alumni_email_id='$alumni'";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $i++;
                        ?>
                    
                    <p>
                    <?php echo $row['alumni_review']; ?>
                    </p>
                        <?php
                            }
                        ?>
                    <br>
                    <br>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    </form>
                        </div>
</body>
</html>