<?php
    include('conn.php');
    $msg="";
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }
    if(isset($_POST['btnsub']))
    {
        $snm=$_POST['snm'];
        $sql="insert into tbl_state(cc_state_name) values('".$snm."')";
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
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() 
        {
            $('#tblstate').dataTable();
        });
    </script>
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
                    <h3 align="center">Insert New State</h3>
                    <br>
                    
                    <input type="text" placeholder="Enter New State Name" class="form-control" required name="snm">
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Enter State Name</div>                
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <button type="submit" name="btnsub" class="btn btn-primary">Insert</button>
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
                    <table id="tblstate" class="table table-stripped table-hover">
                        <thead align="center">
                            <th>State ID</th>
                            <th>State Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                            include('conn.php');
                            $sql="select * from tbl_state";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                        ?>
                            <tr align="center">
                                <td><?php echo $row['cc_state_id']; ?></td>
                                <td><?php echo $row['cc_state_name']; ?></td>
                                <td>
                                    <a class="btn btn-success" href="admin_state_update.php?stateid=<?php echo $row['cc_state_id'];?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger" href="admin_state_delete.php?state_id=<?php echo $row['cc_state_id'];?>"><i class="fa fa-trash"></i></a>
                                </td>    
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
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