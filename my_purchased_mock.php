<?php 
    include('conn.php');
    session_start();

    include 'navbar.php'; 
    $inm="";
    $msg2="";
?>

<section class="section-padding hero-section">

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
                            $sql="select * from tbl_purchased_mock_test where cc_user_email_id='$us'";
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
                      <!-- <button type="submit" href="javascript:void(0)"  name="add_to_cart"  class="btn custom-btn mt-2 mt-lg-3 buynow" value="<?php  echo $row['cc_exam_id'];?>" >Add TO CART</button> -->
                      <a href="javascript:void(0)" data-productid="<?php echo $row['cc_exam_id'];?>" data-productname="<?php echo $row['cc_exam_name'];?>" data-amount="<?php echo $row['cc_price'];?>" class="btn btn-primary buynow">Buy Now</a>

                         
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

<?php include 'footer.php'; ?>
