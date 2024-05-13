<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['user'])) {
        header("location:login.php");
        exit; // Add exit to stop further execution
    }
    include 'navbar.php'; 
?>
<?php include 'header.php'; ?>

<section class="section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h3 class="mb-4 pb-2 text-center">Career Assessment Test Recommendations</h3>
            </div>

            <div class="col-lg-6 col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recommended Courses</h5>
                        <ul class="list-group">
                            <?php
                                // Process the selected options sent from cat.php
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_ids']) && is_array($_POST['selected_ids'])) {
                                    $recommended_courses = [];
                                    foreach ($_POST['selected_ids'] as $question_id => $selected_options) {
                                        if (is_array($selected_options)) {
                                            foreach ($selected_options as $option) {
                                                $recomendation_query = '';
                                                $recomendation = '';
                                                if ($option == 'cc_cat_opt_1') {
                                                    $recomendation_query = "SELECT cc_opt_1_recommendation FROM tbl_cat WHERE cc_cat_qstn_id = $question_id";
                                                } elseif ($option == 'cc_cat_opt_2') {
                                                    $recomendation_query = "SELECT cc_opt_2_recommendation FROM tbl_cat WHERE cc_cat_qstn_id = $question_id";
                                                } elseif ($option == 'cc_cat_opt_3') {
                                                    $recomendation_query = "SELECT cc_opt_3_recommendation FROM tbl_cat WHERE cc_cat_qstn_id = $question_id";
                                                }
                                                $result = mysqli_query($conn, $recomendation_query);
                                                
                                                if (mysqli_num_rows($result) > 0) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    if ($option == 'cc_cat_opt_1') {
                                                        $recomendation = $row["cc_opt_1_recommendation"];
                                                    } elseif ($option == 'cc_cat_opt_2') {
                                                        $recomendation = $row["cc_opt_2_recommendation"];
                                                    } elseif ($option == 'cc_cat_opt_3') {
                                                        $recomendation = $row["cc_opt_3_recommendation"];
                                                    }
                                                    $course_id = $recomendation; // Assuming the recommendation is the course ID
                                                    $recommended_courses[] = $course_id;
                                                }
                                            }
                                        }
                                    }

                                    // Fetch course names for recommended courses
                                    if (!empty($recommended_courses)) {
                                        $recommended_courses_str = implode(',', $recommended_courses);
                                        $course_query = "SELECT cc_course_id, cc_course_name FROM tbl_course WHERE cc_course_id IN ($recommended_courses_str)";
                                        $course_result = mysqli_query($conn, $course_query);
                                        if (mysqli_num_rows($course_result) > 0) {
                                            while ($course_row = mysqli_fetch_assoc($course_result)) {
                                                $course_name = $course_row['cc_course_name'];
                                                echo "<li class='list-group-item'>$course_name</li>";
                                            }
                                        }
                                    } else {
                                        echo "<li class='list-group-item'>No courses recommended.</li>";
                                    }
                                } else {
                                    echo "<li class='list-group-item'>No selected options found.</li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
