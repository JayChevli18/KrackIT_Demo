<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
    }
    include 'navbar.php'; 

    $examid=$_GET['examid'];
    


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
          $sql="select * from tbl_entrance_exam where cc_exam_id=$examid";
//          echo $sql;
          $res=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($res))
          {
          ?>
          <table width=100% align="center"> 
            <tr>
              <td align="left"><img width="285" height="201" src="images/<?php echo $row['cc_exam_logo']; ?>"></img></td>
              <td align="right"><h1><?php echo $row['cc_exam_name']; ?></h1>
                <h3><?php  echo $row['cc_full_form'];  ?></h3>
            </td>
            </tr>
          </table>
      </div>
      <br>
      <div class="card-body bg-white">
        <h5>Conducted By: <?php echo $row['cc_exam_conductby'];?>
        <br>
        <h5>Website URL: <a href="<?php echo $row['cc_exam_website'];?>"><?php echo $row['cc_exam_website'];?></a></h5>
          </h5>
        </div>
            <br>
        <div class="card-body bg-white">
          <br>
          <h3>Eligibilty:</h3> 
            <br>
            <p>
            <?php
            echo $row['cc_eligibility'];
          ?>
          </p>
        <hr>
        </div>
       <br>
        <div class="card-body bg-white">
          <h3>About: </h3>
          <br>
          <p><?php echo $row['cc_exam_about'];?></p>
        <hr>
        </div>
        <br>
        <div class="card-body bg-white">
          <h3>Benefits:</h3>
          <br>
          <p>
            <?php echo $row['cc_exam_benefits']; ?>
          </p>
          <hr>
        </div>
        <br>
        <div class="card-body bg-white">
            <h3>Cutoff: </h3>
            <br>
            <br>
            <img width="100%" height="100%" src="images/<?php echo $row['cc_exam_cutoff'];?>">
            <hr>
        </div>
        <br>
        <br>

        <?php
          }
        ?>
    </form>
  </div>
</section>

<?php
    include 'footer.php';
?>