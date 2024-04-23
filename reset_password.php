<?php include 'navbar.php'; ?>
<!-- <?php include 'header.php'; ?> -->

<section class="section-padding hero-section">
    <div class="container">
        <div class="row justify-content-center"> <!-- Center aligning the form -->
            <div class="col-lg-4 col-md-6 col-sm-8 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <form id="resetPasswordForm" action="reset-password-action.php" method="POST" onsubmit="return validateForm()">
                        <div class="text-center">
                            <h5 class="mb-2">Reset Password</h5>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP *" required oninput="realTimeValidation()">
                            <div id="otpError" class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password *" required >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password *" required oninput="validatePasswordMatch()">
                            <div id="passwordError" class="text-danger"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn custom-btn mt-2 mt-lg-3">Submit</button>
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
    // Function to validate OTP format
    function validateOTP() {
        var otp = document.getElementById("otp").value;
        if (otp.length !== 6) {
            document.getElementById("otpError").innerHTML = "OTP should be 6 digits.";
            return false;
        } else {
            document.getElementById("otpError").innerHTML = "";
            return true;
        }
    }

    // Function to validate password match
    function validatePasswordMatch() {
        var newPassword = document.getElementById("newPassword").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (newPassword !== confirmPassword) {
            document.getElementById("passwordError").innerHTML = "Passwords do not match.";
            return false;
        } else {
            document.getElementById("passwordError").innerHTML = "";
            return true;
        }
    }

    // Function to perform real-time validation
    function realTimeValidation() {
        validateOTP();
        validatePasswordMatch();
    }

    // Function to validate form on submission
    function validateForm() {
        realTimeValidation();

        var otp = document.getElementById("otp").value.trim();
        var newPassword = document.getElementById("newPassword").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        var errorMessage = "";

        if (otp === "" || otp.length !== 6) {
            errorMessage += "Please enter a valid OTP.<br>";
        }

        if (newPassword === "" || confirmPassword === "") {
            errorMessage += "Password fields are mandatory.<br>";
        }

        if (newPassword !== confirmPassword) {
            errorMessage += "Passwords do not match.<br>";
        }

        if (errorMessage !== "") {
            document.getElementById("errorMessages").innerHTML = errorMessage;
            return false;
        }

        return true;
    }
</script>

<?php include 'footer.php'; ?>
