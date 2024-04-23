<?php
    include("conn.php");
    session_start();
//    include 'navbar.php';
    $msg="";
    if(isset($_POST['btnsub']))
    {
        $usnm=$_POST['usnm'];
        $sql="select cc_email_id from tbl_login where cc_email_id='$usnm'";
        $res=mysqli_query($conn,$sql);
        $record=mysqli_num_rows($res);
        if($record==0)
        {
            $msg="Invalid Email ID";
        }
        else
        {
            // $sql1="select cc_email from tbl_login where cc_email_id='$usnm'";
            // $res1=mysqli_query($conn,$sql1);
            // $rec1=mysqli_fetch_array($res1);
            // $usid=$rec1['cc_user_id'];
            $_SESSION['user']=$usnm;
//            $_SESSION['userid']=$usid;
//            echo $usid;
  //          echo $usnm;
            //$result = mysqli_query($conn,"SELECT * FROM register_user WHERE email='" . $_POST["email"] . "'");
            //$count  = mysqli_num_rows($result);
            //if($count>0) {
                // generate OTP
                $otp = rand(100000,999999);
                // Send OTP
                require_once("mail_function.php");
                $mail_status = sendOTP($usnm,$otp);
                
                if($mail_status == 1)
                {
//                    $result = mysqli_query($conn,"INSERT INTO tbl_otp(otp,is_expired,create_at,cc_user_id) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "', ". $usid .")");
                    $sql2="insert into tbl_otp1(otp,is_expired,otp_date,cc_user_email) values(" . $otp . ",0,'". date("Y-m-d H:i:s") . "','". $usnm ."')";
//                    echo $sql2;
                    $res2=mysqli_query($conn,$sql2);
//                  
//                    print_r($res2);
        //            $current_id = mysqli_insert_id($conn);
  //                  if(!empty($current_id))
//                    header("location:sendotp.php");
                    echo "<script>window.location.href='sendotp.php'</script>";

                    {
    //                    $success=1;
                    }
                }  
        
        }
    }
?>


<html>

<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-topic-listing.css" rel="stylesheet">      

    <!-- JAVASCRIPT FILES -->
    <style>
        .clri {
            background-image: linear-gradient(15deg, #24137a 0%, #8097d0 100%);
            /* background-size: cover;
            background-repeat: no-repeat; */
        }
        
    </style>
</head>

<div class="clri">
<section class="section-padding hero-section">
    <form method="post" class="was-validated">
    <section class="vh-100">
        <div class="container py-7 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-white text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-7">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h3 class="fw-bold mb-2 text-uppercase">Forgot Password?</h3>
                                <p class="text-dark-50 mb-5">Please enter your Email ID:</p>
                                
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                        <input type="text" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="usnm" placeholder="Email ID">
                                        <div class="valid-feedback"></div>
                                         <div class="invalid-feedback"><?php echo $msg?></div>
                  
                                    </div>
                                <br>
                                <br>
                                <div>        
                                  <button class="btn btn-outline-dark btn-md px-5" type="submit" name="btnsub">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</form>

</html>
<?php include 'footer.php'; ?>
