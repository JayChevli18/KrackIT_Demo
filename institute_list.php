<?php
    include('conn.php');
    session_start();
    include 'navbar.php'; 
?>
<?php include 'header.php'; ?>
<?php
    // if(!isset($_SESSION['user']))
    // {
    //     //echo "<script>window.location.href='login.php'</script>";
    //     header("location:login.php");
    // }
    $msg2="";
    $inm="";
    if(isset($_POST['btnsub']))
    {
      $inm=$_POST['inm'];
      $sql1="select * from tbl_institute where cc_ins_name like '%{$inm}%'";
      $res1=mysqli_query($conn,$sql1);
      $rec=mysqli_num_rows($res1);
      if($rec==0)
      {
        $msg2="Sorry! Record Not Found";
      }
    }

?>

            
<head>
  <title>Institute</title>
  <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <style>
    .head{  
        background-color: white;
    }
    .clri {
/* //      background-image: url('temp7.jpg');
      background-size: cover;
      background-repeat: no-repeat; */
      background-color: #CCCCFF;
    } 
    a{
      color:black;
    }
    .table-hover tbody tr:hover td{
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


<section class="clri section-padding">
<form method="post"> 
  <br>
  <br>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <!-- <div class="col-md-5">
          <input type="text" name="inm" class="form-control">
        </div>
        <div class="col-md-4"><input type="submit" value="search" class="btn btn-dark" name="btnsub"></div>
        <br>
        <br> -->
      </div>
    </div>
    
    <div class="card bg-white m-5 p-3">
        <div class="container">
            <div class="row">
              <br>
            <h2 align="center" style="color:black"><?php echo $msg2;?></h2>
       
              <table class="table table-hover">
               <tbody>
                        <?php
                            $sql="select * from tbl_institute";
                            if($inm!=null)
                            {
                              $sql.=" where cc_ins_name like '%{$inm}%'";
                            }
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                        ?>
                        <tr>
                        <td width=20% align="center"><img src="images/<?php echo $row['cc_ins_img'];?>"></img></td>
                        <td align="center"><br><h3><a href="ins_speci.php?insid=<?php echo $row['cc_ins_id'];?>"><?php echo $row['cc_ins_name'];?></a></h3>
                        <?php 
                      $sid=$row['cc_state_id'];
                      $cid=$row['cc_city_id'];
                      $sql1="select cc_state_name from tbl_state where cc_state_id=$sid";
                      $res1=mysqli_query($conn,$sql1);
                      $row1=mysqli_fetch_assoc($res1);
                      $snm=$row1['cc_state_name'];
                      $sql2="select cc_city_name from tbl_city where cc_city_id=$cid";
                      $res2=mysqli_query($conn,$sql2);
                      $row2=mysqli_fetch_assoc($res2);
                      $cnm=$row2['cc_city_name'];
                      ?>
                      <br>
                      <p><?php echo $cnm;?>, <?php echo $snm;?></p>
                         
                    </td>                                                            
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </form>
</section>


<?php
    include 'footer.php';
?>