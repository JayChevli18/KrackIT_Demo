<?php
    $x="";
    $row111="";
    $sql111="";
    $res111="";
    $qq="";
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }
    include('conn.php');
    if(isset($_POST['btnsub']))
    {
        $cnm=$_POST['cnm'];
        $cmbstate=$_POST['cmbstate'];
        $sql2="insert into tbl_city(cc_city_name,cc_state_id)values('".$cnm."','".$cmbstate."')";
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .clri {
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
    <form method="post" class="was-validated">
        <br>
        <br>
        <div class="card bg-white p-3 m-5">
        <br>
            <div class="container" align="center">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                    <h3 align="center">Insert New City</h3>
                    <hr>
                    <br>
                    <input type="text" placeholder="Enter New City Name" class="form-control" required name="cnm">
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
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <table class="table table-stripped table-hover">
                        <thead align="center">
                        <th>City ID</th>
                        <th>City Name</th>
                        <th>State ID</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            include('conn.php');
                            $sql="select * from tbl_city";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                            ?>
                            <tr align="center">
                                <td><?php echo $row['cc_city_id']; ?></td>
                                <td><?php echo $row['cc_city_name']; ?></td>
                                <?php
                                $qq=$row['cc_state_id'];
                                $sql111="select * from tbl_state where cc_state_id=$qq";
                                $res111=mysqli_query($conn,$sql111);
                                while($row111=mysqli_fetch_assoc($res111))
                                {
                                ?>
                                    <td><?php echo $row111['cc_state_name']; ?></td>
                                <?php
                                }
                                ?>
                                <td>
                                    <a class="btn btn-success" href="admin_city_update.php?cityid=<?php echo $row['cc_city_id'];?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger" href="admin_city_delete.php?cityid=<?php echo $row['cc_city_id'];?>"><i class="fa fa-trash"></i></a>
                                </td>    
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </form>
                        </div>
</body>
</html>