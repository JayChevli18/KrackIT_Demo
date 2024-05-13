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
                        <li class="breadcrumb-item"><a href="index.php">Purchased Mock Tests</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mock Test List</li>
                    </ol>
                </nav>
                <h2 class="text-white">Test Set</h2>
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
            <div class="col-lg-12 col-12 text-center">
                <?php
                $user_email = $_SESSION['user']; // Get user's email from session
                $query = "SELECT e.cc_exam_name FROM tbl_purchased_mock_test p JOIN tbl_entrance_exam e ON p.cc_exam_id = e.cc_exam_id WHERE p.cc_user_email_id = '$user_email'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $cc_exam_name = $row['cc_exam_name'];
                ?>
                <div class="col-lg-8 col-12 mt-3 mx-auto text-center">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="custom-block-topics-listing-info d-flex mx-auto">
                                <div>
                                    <h5 class="mb-2"><?php echo $cc_exam_name; ?></h5>
                                    <p class="mb-0">Mock Test 1 <br> Mock Test 2 <br> PYQ Test</p>
                                    <a href="mock_test_list.php" class="btn custom-btn mt-3 mt-lg-4">Take Test</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "<div class='col-lg-12 col-12 text-center'><p>No purchased mock tests found.</p></div>";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
    include 'footer.php';
?>
