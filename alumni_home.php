<?php
  include('conn.php');
    session_start();
    $alumni_id=$_SESSION['alumni'];
    if(!isset($_SESSION['alumni']))
    {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Alumni!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        .clri {
            background-image: url('temp7.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .table-hover tbody tr:hover td{
  background-color: white;
  color:black;
}

        <?php include_once('alumni_nav_bar_css.php');
        ?>
    </style>
</head>

<body class="clri">
    <div class="row">
        <div class="col-md-2">
            <?php
                include_once('alumni_nav_bar.php');
            ?>
        </div>
        <div class="col-md-10">
            <br>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3 col-sm-6 col-xs-12 bg-black">
                    <br>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9 col-sm-9 col-xs-10">
                                    <h3 style="color:white" class="mar-no"> <span class="counter">
                                        <?php
                                            $sql="select count(cc_query_id) as total_user from tbl_alumni_query where cc_alumni_id=(select alumni_id from tbl_alumni where alumni_email_id='$alumni_id')";
                                            $res=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_assoc($res);
                                            echo $row['total_user'];
                                        ?>
                                    </span></h3>
                                    <p class="mar-ver-8" style="color:white"> Total Queries </p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-clipboard-question fa-3x text-info"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-3 col-sm-6 col-xs-12 bg-black">
                    <br>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-9 col-xs-10">
                                    <h3 class="mar-no" style="color:white"> <span class="counter">
                                    <?php
                                            $sql1="select count(cc_query_id) as total_user1 from tbl_alumni_query where cc_alumni_id=(select alumni_id from tbl_alumni where alumni_email_id='$alumni_id') and cc_query_ans IS NULL";
                                            $res1=mysqli_query($conn,$sql1);
                                            $row1=mysqli_fetch_assoc($res1);
                                            echo $row1['total_user1'];
                                    ?>
                          
                                    </span></h3>
                                    <p class="mar-ver-8" style="color:white">Queries Pending</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2"><i class="fa fa-reply fa-3x text-danger"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <hr>
        </div>
    </div>
    <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
        <form method="post" class="was-validated">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                <br>
                <br>
                <table class="table table-stripped table-hover bg-white">
                    <thead align="center" class="text-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Query</th>
                        <th>Response</th>
                    </thead>
                    <tbody class="text-dark">
                    <?php
                        $sql="select * from tbl_alumni_query where cc_alumni_id=(select alumni_id from tbl_alumni where alumni_email_id='$alumni_id')";
                        $res=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($res))
                        {
                    ?>
                        <tr align="center">
                            <td><?php echo $row['cc_query_id'];?></td>
                            <td><?php echo $row['cc_query_username'];?></td>
                            <td><?php echo $row['cc_query_email'];?></td>
                            <td><?php echo $row['cc_query_description'];?></td>
                            <td>
                                <?php
                                    if($row['cc_query_ans']==null)
                                    {
                                ?>
                                <a class="btn btn-primary" href="alumni_query_answer.php?queryid=<?php echo $row['cc_query_id'];?>"><i class="fa fa-reply"></i></a>
                                <?php
                                    }
                                    else
                                    {
                                        echo $row['cc_query_ans'];
                                    }
                                ?>
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
        </form>
    </div>
</div>
</body>

</html>