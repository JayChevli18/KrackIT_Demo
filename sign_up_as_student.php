<?php
    include_once("conn.php");
    $msg="";
    if(isset($_POST['btnsub']))
    {
        $nm=$_POST['fullName'];
        $email=$_POST['email'];
        $pswd=$_POST['password'];        
        $epass=base64_encode($pswd);       
        $sql1="insert into tbl_login values('$email','$epass',0)";
        $res1=mysqli_query($conn,$sql1);

        $sql="insert into tbl_user_register(cc_user_name, cc_email_id, cc_password) values('$nm','$email','$epass')";
        $res=mysqli_query($conn,$sql);

        if($res)
        {
            header("location:login.php");
        }        
        else
        {
            $msg="Invalid credetinals!";
        }
    }
    include 'navbar.php'; 

?>
<!-- <?php include 'header.php'; ?> -->

<section class="section-padding hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <form id="signupForm" method="POST" onsubmit="return validateForm()">
                        <div class="text-center">
                            <h5 class="mb-2">Sign Up as a Student</h5>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name *" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email *" required oninput="realTimeValidation()">
                            <div id="emailError" class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Set Password *" required oninput="realTimeValidation()">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password *" required oninput="realTimeValidation()">
                            <div id="passwordError" class="text-danger"></div>
                            <p><?php echo $msg; ?></p>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="btnsub" class="btn custom-btn mt-2 mt-lg-3">Submit</button>
                        </div>
                    </form>
                    <div id="errorMessages" class="mt-3 text-center" style="color: red;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .form-group {
        margin-bottom: 15px; /* Adjust spacing between form fields */
    }
</style>

<script>
    // Function to validate email format
    function validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    // Function to validate password match
    function validatePasswordMatch() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (password !== confirmPassword) {
            document.getElementById("passwordError").innerHTML = "Passwords do not match.";
            return false;
        } else {
            document.getElementById("passwordError").innerHTML = "";
            return true;
        }
    }

    // Function to perform real-time validation
    function realTimeValidation() {
        var email = document.getElementById("email").value;
        var isValidEmail = validateEmail(email);
        if (!isValidEmail) {
            document.getElementById("emailError").innerHTML = "Invalid email format.";
        } else {
            document.getElementById("emailError").innerHTML = "";
        }

        validatePasswordMatch();
    }

    // Function to validate form on submission
    function validateForm() {
        realTimeValidation();

        var fullName = document.getElementById("fullName").value.trim();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        var errorMessage = "";

        if (fullName === "" || email === "" || password === "" || confirmPassword === "") {
            errorMessage = "All fields are mandatory.<br>";
        }

        if (errorMessage !== "") {
            document.getElementById("errorMessages").innerHTML = errorMessage;
            return false;
        }

        return true;
    }
</script>

<?php include 'footer.php'; ?>
