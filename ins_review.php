<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alumni Reviews</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .panel-heading {
      background-color: #007bff;
      color: white;
      padding: 10px;
      border-radius: 5px 5px 0 0;
    }

  .panel-body {
    max-height: 200px; /* Set a fixed height for the panel body */
    overflow-y: auto; /* Enable vertical scrollbar if content exceeds the fixed height */
    padding: 15px;
  }

  .panel-footer {
    background-color: #f8f9fa;
    padding: 10px;
    border-top: 1px solid #dee2e6;
    border-radius: 0 0 5px 5px;
  }
  .contrev {
  margin-left: 10px; /* Adjust as needed */
  margin-right: 100px
    }

</style>

</head>
<body>

<div class="container">
  <div class="row">
    <?php
        $insid=$_GET['insid'];
        $sql="select * from tbl_alumni where alumni_institute=$insid";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            $alumni_id=$row['alumni_id'];
    ?>
    <div class="col-md-6 mb-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title"><?php echo $row['alumni_name'];?></h4>
        </div>
        <div class="panel-body">
            <p><strong>Degree:</strong> 
                <?php
                    $almdg=$row['alumni_degree'];
                    $sql1="select cc_course_name from tbl_course where cc_course_id=$almdg";
                    $res1=mysqli_query($conn,$sql1);
                    $row1=mysqli_fetch_assoc($res1);
                    echo $row1['cc_course_name'];
                ?>
            <br>
          <strong>Graduation Year:</strong> <?php echo $row['alumni_grad_year'];?></p>
          <hr>
          <p><?php echo $row['alumni_review'];?></p>
        </div>
        <div class="panel-footer text-center bg-light">
            <a class="btn btn-primary" href="query.php?alumni_id=<?php echo $row['alumni_id'];?>">Ask Query</a>

        </div>
      </div>
    </div>
    <?php
        }
    ?>    
    <!-- Add more panels for additional alumni reviews -->
  </div>
</div>

<!-- Bootstrap JS and dependencies (jQuery) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
