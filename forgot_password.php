<?php include 'navbar.php'; ?>
<!-- <?php include 'header.php'; ?> -->

<section class="section-padding hero-section">
    <div class="container">
        <div class="row justify-content-center"> <!-- Center aligning the form -->
            <div class="col-lg-4 col-md-6 col-sm-8 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <form id="forgotPasswordForm" method="POST" onsubmit="return validateForm()">
                        <div class="text-center">
                            <h5 class="mb-2">Forgot Password</h5>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email *" required oninput="validateEmail()">
                            <div id="emailError" class="text-danger"></div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn custom-btn mt-2 mt-lg-3" onclick="redirectToResetPassword()">Get OTP</button>
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
    function validateEmail() {
        var email = document.getElementById("email").value;
        const re = /\S+@\S+\.\S+/;
        if (!re.test(email)) {
            document.getElementById("emailError").innerHTML = "Invalid email format.";
        } else {
            document.getElementById("emailError").innerHTML = "";
        }
    }

    // Function to redirect to reset password page
    function redirectToResetPassword() {
        var email = document.getElementById("email").value;
        if (validateEmail()) {
            window.location.href = "reset_password.php?email=" + email;
        } else {
            document.getElementById("emailError").innerHTML = "Please enter a valid email address.";
        }
    }

    // Function to validate form on submission
    function validateForm() {
        var email = document.getElementById("email").value.trim();

        var errorMessage = "";

        if (email === "") {
            errorMessage = "Email field is mandatory.<br>";
        }

        if (errorMessage !== "") {
            document.getElementById("errorMessages").innerHTML = errorMessage;
            return false;
        }

        return true;
    }
</script>

<?php include 'footer.php'; ?>
