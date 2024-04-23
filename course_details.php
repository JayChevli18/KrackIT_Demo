<?php 
    include_once('conn.php');
    session_start();
    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
    }
    include 'navbar.php'; 
?>
<?php
    $cid=$_GET['courseid'];
?>

<head>
  <title>Welcome to Career Counselling</title>
  <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.responsivevoice.org/responsivevoice.js"></script>

  <style>
    .head{  
        background-color: white;
    }
    td 
    {
        text-align: center;
    }
    a
    {
        color:black;
    }    .table-hover tbody tr:hover td{
  background-color: black;
  color:white;
}
.table-hover tbody tr:hover a{
  color:cyan;
}
.table-hover tbody tr:hover a:hover{
  color:blue;
}

  </style>
 </head>



<section class="section-padding hero-section">

<form method="post" class="was-validated">
    <br>
    <br>
    <div class="container">
        <div class="row">
            <?php
                $sql="select * from tbl_course where cc_course_id=$cid";
                $res=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($res))
                {
            ?>
            <div class="card bg-white">
               <h1><?php $cnm=$row['cc_course_name'];
                echo $cnm;?></h1> 
               <hr>
               <p><?php echo $row['cc_course_description'];?></p>
            </div>
            <?php
                }
            ?>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="card bg-white">
                <hr>
                <h1 align="center">Top <?php echo $cnm;?> Institute</h1>
                <hr>
                <table border=0 class="table table-hover">
                <tbody>
                <?php
                    $sql0="select * from tbl_ins_course where cc_course_id=$cid";
                    $res0=mysqli_query($conn,$sql0);
                    while($row0=mysqli_fetch_assoc($res0))
                    {
                        $insid=$row0['cc_ins_id'];
                        $sql3="select * from tbl_institute where cc_ins_id=$insid";
                        $res3=mysqli_query($conn,$sql3);
                        while($row3=mysqli_fetch_assoc($res3))
                        {
                ?>
                <tr>
                    <td width=30%><img src="images/<?php echo $row3['cc_ins_img'];?>"></img></td>
                    <td><br><h5><a href="ins_speci.php?insid=<?php echo $row3['cc_ins_id'];?>"><?php echo $row3['cc_ins_name'];?></a></h5>
                    <br><?php 

                      $sid=$row3['cc_state_id'];
                      $cid=$row3['cc_city_id'];
                      $sql4="select cc_state_name from tbl_state where cc_state_id=$sid";
                      $res4=mysqli_query($conn,$sql4);
                      $row4=mysqli_fetch_assoc($res4);
                      $snm=$row4['cc_state_name'];
                      $sql5="select cc_city_name from tbl_city where cc_city_id=$cid";
                      $res5=mysqli_query($conn,$sql5);
                      $row5=mysqli_fetch_assoc($res5);
                      $cnm=$row5['cc_city_name'];
                      ?>
                      <p><?php echo $cnm;?>, <?php echo $snm;?></p>
                  
                </td>
                </tr>
                <?php
                        }  
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    </form>
</section>




<?php include 'footer.php'; ?>
