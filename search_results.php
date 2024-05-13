<?php
include('conn.php');
session_start();

if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit;
}
include 'navbar.php'; 

// Retrieve the search keyword from the URL parameter
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Perform the search in tbl_institute
    $query = "SELECT * FROM tbl_institute WHERE cc_ins_name LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);

    // Perform the search in tbl_course
    $query2 = "SELECT * FROM tbl_course WHERE cc_course_name LIKE '%$keyword%'";
    $result2 = mysqli_query($conn, $query2);

    // Perform the search in tbl_entrance_exam
    $query3 = "SELECT * FROM tbl_entrance_exam WHERE cc_exam_name LIKE '%$keyword%'";
    $result3 = mysqli_query($conn, $query3);

    // Check if any match is found
    if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0 || mysqli_num_rows($result3) > 0) {
?>
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h3 class="mb-4">Search Results</h3>
                    </div>
<?php
        // Display search results from tbl_institute
        while ($row = mysqli_fetch_assoc($result)) {
?>
                    <div class="col-lg-8 col-12 mt-3 mx-auto">
                        <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                            <div class="d-flex">
                                <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                <div class="custom-block-topics-listing-info d-flex">
                                    <div>
                                        <h5 class="mb-2"><?php echo $row['cc_ins_name']; ?></h5>
                                        <p class="mb-0">Institute details...</p>
                                        <a href="ins_speci.php?insid=<?php echo $row['cc_ins_id']; ?>" class="btn custom-btn mt-3 mt-lg-4">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
        }

        // Display search results from tbl_course
        while ($row = mysqli_fetch_assoc($result2)) {
?>
                    <div class="col-lg-8 col-12 mt-3 mx-auto">
                        <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                            <div class="d-flex">
                                <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                <div class="custom-block-topics-listing-info d-flex">
                                    <div>
                                        <h5 class="mb-2"><?php echo $row['cc_course_name']; ?></h5>
                                        <p class="mb-0">Course details...</p>
                                        <a href="course_details.php?courseid=<?php echo $row['cc_course_id']; ?>" class="btn custom-btn mt-3 mt-lg-4">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
        }

        // Display search results from tbl_entrance_exam
        while ($row = mysqli_fetch_assoc($result3)) {
?>
                    <div class="col-lg-8 col-12 mt-3 mx-auto">
                        <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                            <div class="d-flex">
                                <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                <div class="custom-block-topics-listing-info d-flex">
                                    <div>
                                        <h5 class="mb-2"><?php echo $row['cc_exam_name']; ?></h5>
                                        <p class="mb-0">Entrance exam details...</p>
                                        <a href="entrance_exam_details.php?examid=<?php echo $row['cc_exam_id']; ?>" class="btn custom-btn mt-3 mt-lg-4">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
        }
?>
                </div>
            </div>
        </section>
<?php
    } else {
        // No details found
        echo "<section class='section-padding'><div class='container'><div class='row'><div class='col-lg-12 col-12 text-center'><p>No details found.</p></div></div></div></section>";
    }
} else {
    // Handle case when keyword is not set
    echo "<section class='section-padding'><div class='container'><div class='row'><div class='col-lg-12 col-12 text-center'><p>No search keyword provided.</p></div></div></div></section>";
}

include 'footer.php';
?>
