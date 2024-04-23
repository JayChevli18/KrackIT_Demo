<?php
  include('conn.php');
  session_start();
  include 'navbar.php';

  $user_id="";
  $msg2="";
  $inm="";

  if(isset($_POST['add_to_cart']))
  {
    //productid:

    if(!isset($_SESSION['user']))
    {
      echo "<script>window.location.href='login.php'</script>";
    }
    $user_email_id=$_SESSION['user'];
    echo $user_email_id;
    $exam_id=$_POST['add_to_cart'];
    echo $exam_id."<br>";
    
    $sql="select * from tbl_entrance_exam where cc_exam_id=$exam_id";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);

    echo $row['cc_price'];

  }


?>


<head>
  <title>Mock</title>

  <style>
    a{
      color:black;
    }
    .table-hover tbody tr:hover td, h5{
  color:black;
}

.table-hover tbody tr:hover a , h3:hover{
  color:#00008B;
}
.table-hover tbody tr:hover a:hover{
  color:blue;
}


.text-with-margin {
            margin-top: 50px;    /* Top margin */
            margin-right: 100px;  /* Right margin */
            /* Bottom margin */
            margin-left: 50px;   /* Left margin */
}
  </style>
 </head>

<h1 class="text-with-margin"> Mock Test List :</h1>

<section class="section-padding">

<form method="post"> 
  <br>
  <br>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
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
                            $sql="select * from tbl_entrance_exam";
                            if($inm!=null)
                            {
                              $sql.=" where cc_exam_id '";
                            }
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                        ?>
                        
                        <tr>
                        <td width=20% align="center"><br><img align="center" width="285px" height="201px" src="images/<?php echo $row['cc_exam_logo'];?>"></img></td>
                        <td align="center"> <br><h3><a href="mock_speci.php?examid=<?php echo $row['cc_exam_id'];?>"><?php echo $row['cc_exam_name'];?> Mock Test Package</a></h3>
                        <?php 
                       $snm=$row['cc_full_form'];
                       $price=$row['cc_price'];
                      ?>
                      <br>
                      <p>
                      <?php echo $snm;?><br>
                      </p>
                      <h5>
                      Rate: <?php echo $price;?>
                      </h5>
                      <br>
                      <button type="submit" name="add_to_cart"  class="btn custom-btn mt-2 mt-lg-3" value="<?php  echo $row['cc_exam_id'];?>" >Add TO CART</button>
                      
                         
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
