<?php
  include('conn.php');
    session_start();
    if(!isset($_SESSION['useradmin']))
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
    <title>Hello Admin!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        .clri {
            /* background-image: url('temp7.jpg'); */
            background-color: #B2A4D4;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .table-hover tbody tr:hover td{
  background-color: white;
  color:black;
}

        <?php include_once('admin_nav_bar_css.php');
        ?>
    </style>
</head>

<body class="clri">
    <div class="row">
        <div class="col-md-2">
            <?php
                include_once('admin_nav_bar.php');
            ?>
        </div>
        <div class="col-md-10">
            <br>
            <br>
            <div class="card">
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
                                            $sql="select count(cc_user_id) as total_user from tbl_register";
                                            $res=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_assoc($res);
                                            echo $row['total_user'];
                                        ?>
                                    </span></h3>
                                    <p class="mar-ver-5" style="color:white"> Users </p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-user fa-3x text-white"></i> </div>
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
                                            $sql1="select count(cc_ins_id) as total_ins from tbl_institute";
                                            $res1=mysqli_query($conn,$sql1);
                                            $row1=mysqli_fetch_assoc($res1);
                                            echo $row1['total_ins'];
                                    ?>
                          
                                    </span></h3>
                                    <p class="mar-ver-5" style="color:white">Institutes</p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2"><i class="fa fa-university fa-3x text-info"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3 col-sm-6 col-xs-12 bg-black">
                    <br>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-9 col-xs-10">
                                    <h3 class="mar-no" style="color:white"> <span class="counter">
                                    <?php
                                            $sql2="select count(cc_course_id) as total_course from tbl_course";
                                            $res2=mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_assoc($res2);
                                            echo $row2['total_course'];
                                    ?>
                          
                                    </span></h3>
                                    <p class="mar-ver-5" style="color:white"> Courses </p>
                                    <br>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-book-open fa-3x text-primary" ></i>
                                </div>
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
                                            $sql3="select count(cc_query_id) as total_query from tbl_query where cc_query_ans is null";
                                            $res3=mysqli_query($conn,$sql3);
                                            $row3=mysqli_fetch_assoc($res3);
                                            echo $row3['total_query'];
                                    ?>
                          
                                    </span></h3>
                                    <p class="mar-ver-5" style="color:white"> Query </p>
                                    <br>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-clipboard-question fa-3x text-danger" ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3 col-sm-6 col-xs-12 bg-black">
                    <br>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-9 col-xs-10">
                                    <h3 class="mar-no" style="color:white"> <span class="counter">
                                    <?php
                                            $sql2="select count(alumni_id) as total_alumni from tbl_alumni";
                                            $res2=mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_assoc($res2);
                                            echo $row2['total_alumni'];
                                    ?>
                          
                                    </span></h3>
                                    <p class="mar-ver-5" style="color:white"> Alumni </p>
                                    <br>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-user-graduate fa-3x text-warning" ></i>
                                </div>
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
                                            $sql3="select count(cc_query_id) as total_query from tbl_query where cc_query_ans is null";
                                            $res3=mysqli_query($conn,$sql3);
                                            $row3=mysqli_fetch_assoc($res3);
                                            echo $row3['total_query'];
                                    ?>
                          
                                    </span></h3>
                                    <p class="mar-ver-5" style="color:white"> Query </p>
                                    <br>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-clipboard-question fa-3x text-danger" ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            </div>
        <hr>
            <?php
                include('admin_regform.php');
            ?>
        </div>
    </div>
</body>

</html>