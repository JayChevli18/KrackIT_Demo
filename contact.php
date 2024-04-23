<?php 
    include_once('conn.php');
    session_start();
    include 'navbar.php'; 
    if(isset($_POST['btnsub']))
    {
      $usnm=$_POST['usnm'];
      $email=$_POST['email'];
      $querydesc=$_POST['querydesc'];
      $sql="insert into tbl_query(cc_query_username,cc_query_email,cc_query_description) values('$usnm','$email','$querydesc')";
      $res=mysqli_query($conn,$sql);
      if($res==1)
      {
        $msg="Your Query has been sent!";
      }
      else
      {
        $msg="Query has not been sent. Please Try Again!";
      }
    }
  
?>
<style>
    .clri{
        background-color: #CCCCFF;
    }
    a{
      color:black;
    }

</style>
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>

                <h2 class="text-white">Contact Us</h2>
            </div>

        </div>
    </div>
</header>
            <section class="section-padding clri">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4 pb-2">We'd love to hear from you</h3>
                        </div>

                        <div class="col-lg-6 col-12">
                            <form method="post" class="custom-form contact-form" role="form">
                                <div class="row">
                                <hr>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="usnm" id="usnm" class="form-control" placeholder="Name" required="">
                                            
                                            <label for="floatingInput">Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                            
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-12">
                                    <br>
                                    <!-- <div class="form-floating">
                                            <input type="text" name="subject" id="name" class="form-control" placeholder="Name" required="">
                                            
                                            <label for="floatingInput">Subject</label>
                                        </div> -->

                                        <div class="form-floating">
                                            <textarea class="form-control" id="querydesc" name="querydesc" placeholder="Tell me about the project"></textarea>
                                            
                                            <label for="floatingTextarea">Type your Query or Feedback</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 ms-auto">
                                        <button type="submit" class="form-control" name="btnsub">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="col-lg-5 col-12 mx-auto mt-5 mt-lg-0">
                                <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.497264189475!2d72.62634057437305!3d23.18854191011598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c2a3c9618d2c5%3A0xc54de484f986b1fa!2sDA-IICT!5e0!3m2!1sen!2sin!4v1712496271116!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <h5 class="mt-4 mb-2">Head Quarter</h5>

                            <p>Daiict college, Reliance Cross Rd, Gandhinagar, Gujarat 382007</p>
                        </div>

                    </div>
                </div>
            </section>

<?php include 'footer.php'; ?>
