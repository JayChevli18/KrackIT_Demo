<?php
    include('conn.php');
    session_start();
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
    /* .clri {
      background-image: url('temp7.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    } */
    .head{  
        background-color: white;
    }
    td {
  text-align: center;
}
  </style>
 </head>


 <section class="section-padding">
<form method="post" class="was-validated">
    <br>
    <br>
      <div class="card-header head">
         <?php 
         #exam list
          $sql="select * from tbl_entrance_exam where cc_exam_id=$examid";
          $res=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($res))
          {
          ?>



          <table width=100% align="center"> 
            <tr>
              <td align="left"><img width="285" height="201" src="images/<?php echo $row['cc_exam_logo']; ?>"></img></td>
              <td align="right"><h1><?php echo $row['cc_exam_name']; ?></h1>
              
              <div class="card bg-white">
               <h1>
                <br>
                </h1> 

               <hr>
               <p class="ok"> About :</p> <p> <?php echo $row['cc_exam_about'];?></p>

            </div>

            </td>
            </tr>
          </table>
        </div>

        <div class="card-body bg-white">
          <?php
          }
          ?>
        </div>     
    </form>
</section>

<?php
    include 'footer.php';
?>