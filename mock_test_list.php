<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['user'])) {
        header("location:login.php");
        exit;
    }
    include 'navbar.php'; 
?>
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Purchased Mock Tests</li>
                    </ol>
                </nav>

                <h2 class="text-white">Purchased Mock Tests</h2>
            </div>

        </div>
    </div>
</header>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">My Mock Tests</h3>
            </div>

            <div class="col-lg-8 col-12 mt-3 mx-auto">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">Mock Test 1</h5>
                                <p class="mb-0">30 Questions of Mock Test 1</p>
                                <a href="live_test.php" class="btn custom-btn mt-3 mt-lg-4">Take Test</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-12 mt-3 mx-auto">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">Mock Test 2</h5>
                                <p class="mb-0">30 Questions of Mock Test 2</p>
                                <a href="live_test.php" class="btn custom-btn mt-3 mt-lg-4">Take Test</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-12 mt-3 mx-auto">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">PYQ Test</h5>
                                <p class="mb-0">30 Questions of PYQ Test</p>
                                <a href="live_test.php" class="btn custom-btn mt-3 mt-lg-4">Take Test</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
    include 'footer.php';
?>
