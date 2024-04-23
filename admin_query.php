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
                        $sql="select * from tbl_query";
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
                                <a class="btn btn-primary" href="admin_query_answer.php?queryid=<?php echo $row['cc_query_id'];?>"><i class="fa fa-reply"></i></a>
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
