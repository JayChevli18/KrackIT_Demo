<?php 
    include_once('conn.php');
    session_start();
    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
    }
    include 'navbar.php'; 
    $alumni_id=$_GET['alumni_id'];
    $qdesc="";
    $qusnm="";
    $qemail="";
    $msg="";
    if(isset($_POST['btnsub']))
    {
        $qdesc=$_POST['qdesc'];
        $qusnm=$_POST['qusnm'];
        $qemail=$_POST['qemail'];
  //      echo $qdesc."   ".$qusnm."  ".$qemail;
        $sql="insert into tbl_alumni_query(cc_query_username,cc_query_email,cc_query_description,cc_alumni_id) values ('$qusnm','$qemail','$qdesc',$alumni_id)";
//        echo $sql;
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            $msg="Query Sent Succesfully!";
        }
        else
        {
            $msg="Error! Resend your Query!";
        }
    }    
?>
<?php
    $alumni_id=$_GET['alumni_id'];
    $user=$_SESSION['user'];
    //echo $user;
    $sql="select * from tbl_user_register where cc_email_id='$user'";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
?>

<section class="section-padding hero-section">
  <form method="post" class="was-validated">
      <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="card bg-white">

                    <table class="table" width=100%>
                        <tr>
                            <br><br>
                        </tr>
                        <tr>
                            <td width=40%>User Name</td>
                            <td><input name="qusnm" type="text" value="<?php echo $row['cc_user_name']; ?>"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td width=40%>Email ID</td>
                            <td><input name="qemail" type="text" value="<?php echo $row['cc_email_id']; ?>"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td width=40%>Your Query</td>
                            <td><textarea name="qdesc" placeholder="Type your Query here..." class="form-control" rows=4></textarea></td>
                        </tr>                        
                    </table>
<?php
    }
?>               
                    <div align="center">
                    <h5>
                    <?php echo $msg;?>
                    </h5>
                    <br>
        
                    <button type="submit" name="btnsub" class="btn btn-primary">Submit</button>
                       
                </div>
                <br>
            </div>
            <div class="col-md-2"></div>
            <br>
            <br>
            <br>
            </div>            
        </div>
</form>
</section>


<?php include 'footer.php'; ?>

