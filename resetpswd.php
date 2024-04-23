<?php
    include("conn.php");
    session_start();
//    include('navbar.php');
    $msg="";
        
    if(isset($_POST['btnsub']))
    {
        if(isset($_SESSION['user']))
        {
            $user=$_SESSION['user'];
        }
        $x=$_POST['pswd'];
        $y=$_POST['cnpswd'];
        if($x==$y)
        {
            $z=base64_encode($x);
            $sql="update tbl_user_register set cc_password='$z' where cc_email_id='$user'";
            $res=mysqli_query($conn,$sql);
            $sql1="update tbl_login set cc_password='$z' where cc_email_id='$user'";
            $res1=mysqli_query($conn,$sql1);
            session_destroy();
            echo "<script>window.location.href='login.php'</script>";
        }
        else
        {
            $msg="Both Password should be same";
            //echo $msg;
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
        <section class="vh-100">
            <div class="container py-7 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-white text-dark" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-7">
                                    <h3>Change Password</h3>
                                <p>Set a new password</p>
                                <br>
                                <div>
                                    <input type="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$" class="form-control" name="pswd" placeholder="Enter new password">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Invalid</div>
                  
                                    <br>
                                    <input type="password" name="cnpswd" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,}$" class="form-control" placeholder="Confirm password">                                       
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback"><?php echo "Password should be same" ?></div>
                  
                                    <br>
                                </div>
                                <br>
                                <br>
                                <div>
                                    <button class="btn btn-outline-dark btn-md px-4" type="submit" name="btnsub">Submit</button>
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

<?php include('footer.php');?>