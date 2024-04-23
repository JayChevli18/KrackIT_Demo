<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
    }
    include 'navbar.php'; 

    $insid=$_GET['insid'];
    


?>
<?php include 'header.php'; ?>

<head>
  <title>Institute</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <style>
     .clri {
/* //      background-image: url('temp7.jpg');
      background-size: cover;
      background-repeat: no-repeat; */
      background-color: #CCCCFF;
    } 
    .head{  
        background-color: white;
    }
    td {
  text-align: center;
}
.cont {
  margin-left: 20px; /* Adjust as needed */
  margin-right: 20px
}
  </style>
 </head>


<section class="section-padding clri">  
<div class="cont">
<form method="post" class="was-validated">
    <br>
    <br>
      <div class="card-header head" style="background-color: white;">
         <?php 
          $sql="select * from tbl_institute where cc_ins_id=$insid";
          $res=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($res))
          {
          ?>
          <table width=100% align="center"> 
            <tr>
              <td align="left"><img src="images/<?php echo $row['cc_ins_img']; ?>"></img></td>
              <td align="right"><h1><?php echo $row['cc_ins_name']; ?></h1>
              <p><?php
                $sid=$row['cc_state_id'];
                $cid=$row['cc_city_id'];
                
                $sql5="select * from tbl_city where cc_city_id=$cid";
                $res5=mysqli_query($conn,$sql5);
                while($row5=mysqli_fetch_assoc($res5))
                {
                  $cnm=$row5['cc_city_name'];
                }                
                $sql6="select * from tbl_state where cc_state_id=$sid";
                $res6=mysqli_query($conn,$sql6);
                while($row6=mysqli_fetch_assoc($res6))
                {
                  $snm=$row6['cc_state_name'];
                }
                echo $snm;
              ?>, <?php echo $cnm;?></p>
                <a href="<?php echo $row['cc_ins_link'];?>"><?php echo $row['cc_ins_link'];?></a>
            </td>
            </tr>
          </table>
      </div>
      <br>
      <div class="card-body bg-white">
        <h5>Established in: <?php echo $row['cc_ins_establish'];?>
        <?php $sectorid=$row['cc_ins_sector_id'];
          $sql2="select * from tbl_sector where cc_sector_id=$sectorid";
          $res2=mysqli_query($conn,$sql2);
          while($row2=mysqli_fetch_assoc($res2))
          {
        ?>
        <br>
          </h5>
          <h5>
            Sector: <?php echo $row2['cc_sector_name'];?>
        <br>
          </h5>
        <h5 style="color:red;">Admission Process:  <?php echo $row['cc_ins_admission'];?>
          </h5>
        <hr>
        </div>
            <br>
        <div class="card-body bg-white">
          <?php
          }
          ?>
          <br>
          <h3>Eligibilty:</h3> 
            <br>
            <p>
            <?php
            echo $row['cc_ins_eligibilty'];
          ?>
          </p>
        <hr>
        </div>
       <br>
        <div class="card-body bg-white">
          <h3>About: </h3>
          <br>
          <p><?php echo $row['cc_ins_desc'];?></p>
        <hr>
        </div>
        <br>
        <div class="card-body bg-white">
          <h3>Entrance Exam:</h3>
          <br>
          <p>
            <?php
              $in=$row['cc_ins_id'];
              $sql3="select * from tbl_ins_exam where cc_ins_id=$in";
              $res3=mysqli_query($conn,$sql3);
              while($row3=mysqli_fetch_assoc($res3))
              {
                $x=$row3['cc_exam_id'];
                $sql4="select * from tbl_entrance_exam where cc_exam_id=$x";
                $res4=mysqli_query($conn,$sql4);
                while($row4=mysqli_fetch_assoc($res4))
                {
                  echo "<ul>";
                  echo  "<li>".$row4['cc_exam_name']."</li><br>";
                  echo "</ul>";
                }
              }  
            ?>
          </p>
          <hr>
        </div>
        <br>
        <div class="card-body bg-white">
          <h3>Placement Report: </h3>
          <br>
          <p><b>Click on below button to download the report.</b></p>
          <?php $downpdf=$row['cc_ins_placement_report'];?>
              <button class="btn btn-primary" onclick="window.open('placementreport/<?php echo $downpdf;?>')">Click Here!</button>
              <hr>
        </div>
        <br>
        <div class="card-footer bg-white">
            <div class="row">
              <div class="col-md-6">
                <h3>Contact Details:</h3>
                <br>
                <p>Email ID: <?php echo $row['cc_ins_email_id'];?></p>
                <p>Contact No: <?php echo $row['cc_ins_contact'];?></p>
                <p>Address: <?php echo $row['cc_ins_address'];?></p> 
              </div>
              <div class="col-md-6" align="center">
              <iframe src="<?php echo $row['cc_ins_logical_add']?>" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>  
        </div>
        <br>
        <div class="card-body bg-white">
          <h3>Reviews: </h3>
          <br>
          <br>
          <?php include('ins_review.php'); ?>
              <hr>
        </div>

        <?php
          }
        ?>
    </form>
  </div>
</section>

<?php
    include 'footer.php';
?>