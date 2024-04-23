<?php
    include('conn.php');
    session_start();
//    include('navbar.php');
    $otp="";
    $error_message="";
    if(isset($_SESSION['user']))
    {
        $user=$_SESSION['user'];
    }
    if(isset($_POST['btnsub']))
    {
        $otp=$_POST['otp'];
        $sql="select * from tbl_otp1 where otp='$otp' AND is_expired!=1";
        $res=mysqli_query($conn,$sql);
        $count  = mysqli_num_rows($res);
        if(!empty($count)) 
        {
            $sql2="update tbl_otp1 set is_expired=1 where otp='$otp'";
            $res2=mysqli_query($conn,$sql2);
            $success = 2;	
            echo "<script>window.location.href='resetpswd.php'</script>";
        }
        else
        {
		    $success =1;
		    $error_message = " OTP!";
	    }
        if(isset($_SESSION['user']))
        {
            $user=$_SESSION['user'];
        }
    }
?>
<html>

<head>
    <title>OTP</title>
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


    <style>
        .clri {
            background-image: url('temp7.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>


<section class="section-padding hero-section">
<form method="post" class="was-validated">
    <section class="vh-40">
        <div class="container py-8 h-80">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-white text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-7">
                                <h3 class="fw-bold mb-2 text-uppercase">Verification</h3>
                                <p class="text-dark-50 mb-4">Please enter the code:</p>
                                <h1><i class="fa fa-envelope-open"></i></h1>
                                <br>
                                    <br>
                                    <input type="text" name="otp" class="form-control" pattern="[0-9]{6}" placeholder="Enter OTP" required>
                                <div class="valid-feedback">Valid</div>
                                <div class="invalid-feedback">Invalid<?php echo $error_message; ?></div>
                                <br>                                                                           
                                <div>
                                    <button class="btn btn-outline-dark btn-md px-5" type="submit" name="btnsub">Verify</button>
                                </div>
                                <br>
                                <div>
                                    <p>Didn't get the code?<a href="forgotpassword.php">Resend</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
</section>

</html>

<?php include('footer.php'); ?>