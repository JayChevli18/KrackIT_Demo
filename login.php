
<?php
    include('conn.php');
    session_start();
    $flag="";

    // if(isset($_SESSION['user'])){
    //     header('Location: index.php');
    //     exit;
    // }

    require 'google-api/vendor/autoload.php';

    $client = new Google_Client();

    // Enter your Client ID
    $client->setClientId('895155013369-7edq8bqc0coptjb4jh16gkmbgct47mj8.apps.googleusercontent.com');
    // Enter your Client Secrect
    $client->setClientSecret('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');
    // Enter the Redirect URL
    $client->setRedirectUri('http://localhost/jay/cap_project/Krackit-main/login.php');

    // Adding those scopes which we want to get (email & profile Information)
    $client->addScope("email");
    $client->addScope("profile");

    if(isset($_GET['code'])):

        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
        if(!isset($token["error"]))
        {
    
            $client->setAccessToken($token['access_token']);
    
            // getting profile information
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
        
            // Storing data into database
            $id = mysqli_real_escape_string($conn, $google_account_info->id);
            $full_name = mysqli_real_escape_string($conn, trim($google_account_info->name));
            $email = mysqli_real_escape_string($conn, $google_account_info->email);
            $profile_pic = mysqli_real_escape_string($conn, $google_account_info->picture);
    
            // checking user already exists or not
            $get_user = mysqli_query($conn, "SELECT cc_google_id FROM tbl_user_register WHERE cc_google_id='$id'");
            if(mysqli_num_rows($get_user) > 0){
    
                $_SESSION['user'] = $email; 
                header('Location: index.php');
                exit;
    
            }
            else{
    
                // if user not exists we will insert the user
                $insert = mysqli_query($conn, "INSERT INTO `tbl_user_register`(`cc_google_id`,`cc_user_name`,`cc_email_id`,`cc_profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");
//                $insert = mysqli_query($conn, "INSERT INTO `tbl_login`(`cc_email_id`,`cc_profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");
    
                if($insert){
                    $_SESSION['user'] = $email; 
                    header('Location: index.php');
                    exit;
                }
                else{
                    echo "Sign up failed!(Something went wrong).";
                }
    
            }
    
        }
        else{
            header('Location: login.php');
            exit;
        }
        
    else: 
        
    if(isset($_POST['btngooge']))
    {
        
    }
    if(isset($_POST['btnsub']))
    {
        $emid=$_POST['email'];
        $pswd=$_POST['password'];

        $sql="select * from tbl_login where cc_email_id='$emid'";
        $res=mysqli_query($conn,$sql);
        $record=mysqli_num_rows($res);
        if($record==0)
        {
            $msg1="Invalid user name!";
        }
        else
        {
            $sql1="select * from tbl_login where cc_email_id='$emid'";
            $res1=mysqli_query($conn,$sql1);
            $record1=mysqli_fetch_assoc($res1);
            $eres2=$record1['cc_password'];
            $flag=$record1['cc_flag'];
            $res2=base64_decode($eres2);
            if($emid=="jconeseven@gmail.com" && $pswd=="jconeseven17")
            {
              $_SESSION['useradmin']=$emid;
              header("location:admin_home.php");
            }
            else if($pswd==$res2 && $flag==0)
            {
                $_SESSION['user']=$emid;
                header("location:index.php");
                $msg2="Login success";
            }
            else if($pswd==$res2 && $flag==2)
            {
                $_SESSION['alumni']=$emid;
                header("location:alumni_home.php");
                $msg2="Login success";
            }
            else
            {
                $msg2="Invalid username or";
            }

        }

    }

?>
<?php include 'navbar.php'; ?>

<!-- <?php include 'header.php'; ?> -->

<section class="section-padding hero-section">
    <div class="container">
        <div class="row justify-content-center"> <!-- Center aligning the form -->
            <div class="col-lg-4 col-md-6 col-sm-8 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <form  method="POST">
                        <div class="text-center">
                            <h5 class="mb-2">Sign In</h5>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btnsub" class="btn custom-btn mt-2 mt-lg-3">Submit</button>
                            <br>
                            <a type="button" class="btn custom-btn mt-2 mt-lg-3" href="<?php echo $client->createAuthUrl(); ?>">Sign in with Google</a>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="forgotpassword.php">Forgot Password?</a> | <a href="sign_up_options.php">New User Signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php include 'footer.php'; ?>
