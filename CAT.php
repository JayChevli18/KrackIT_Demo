<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
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
                        <li class="breadcrumb-item active" aria-current="page">CAT</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</header>

<section class="section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h3 class="mb-4 pb-2 text-center">Take Career Assessment Test</h3>
            </div>

            <div class="col-lg-6 col-12 mx-auto">
                <form action="cat_recommendations.php" method="post" class="custom-form contact-form" role="form">
                    <div class="row">
                        <?php
                        // Include database connection
                        include 'conn.php';
                        
                        // Fetch questions from tbl_cat
                        $sql = "SELECT cc_cat_qstn_id, cc_cat_qstn FROM tbl_cat";
                        $result = mysqli_query($conn, $sql);

                        // Check if there are questions
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each question
                            while ($row = mysqli_fetch_assoc($result)) {
                                $qstn_id = $row['cc_cat_qstn_id'];
                                $question = $row['cc_cat_qstn'];

                                // Display question
                                echo '<div class="col-lg-12 col-12 mt-4">';
                                echo '<h5>'.$question.'</h5>';

                                // Fetch options for the current question
                                $sql_options = "SELECT cc_cat_opt_1, cc_cat_opt_2, cc_cat_opt_3 FROM tbl_cat WHERE cc_cat_qstn_id = $qstn_id";
                                $result_options = mysqli_query($conn, $sql_options);

                                // Check if there are options
                                if (mysqli_num_rows($result_options) > 0) {
                                    // Loop through each option
                                    while ($row_options = mysqli_fetch_assoc($result_options)) {
                                        // Display options as checkboxes
                                        foreach ($row_options as $key => $value) {
                                            echo '<div class="form-check">';
                                            echo '<input class="form-check-input" type="checkbox" id="'.$key.'" name="selected_ids['.$qstn_id.'][]" value="'.$key.'">';
                                            echo '<label class="form-check-label" for="'.$key.'">'.$value.'</label>';
                                            echo '</div>';
                                        }
                                    }
                                }
                                echo '</div>'; // Close question container
                            }
                        }
                        ?>
                        <div class="col-lg-12 col-12 mt-4 text-center">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
