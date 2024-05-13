<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['user'])) {
        header("location:login.php");
        exit; // Add exit to stop further execution
    }
    include 'navbar.php'; 
?>

<!-- Add the header HTML here -->
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>
                    </ol>
                </nav>
                <h2 class="text-white">Live Test</h2>
            </div>
        </div>
    </div>
</header>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Comprehensive Question Paper</h3>
            </div>
            
            <div class="col-lg-8 col-12 mt-3 mx-auto">
                <form method="post" action="result.php">
                <?php
                    // Function to fetch questions from the database
                    function getQuestionsFromDatabase() {
                        global $conn;
                        $sql = "SELECT * FROM tbl_test_questions WHERE cc_t_id = 1"; // Change 3 to the appropriate test ID
                        $result = mysqli_query($conn, $sql);
                        $questions = array();
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $questions[] = array(
                                    "question_id" => $row['cc_q_id'], // Add question ID
                                    "question_text" => $row['cc_question'],
                                    "options" => array($row['cc_option_a'], $row['cc_option_b'], $row['cc_option_c'], $row['cc_option_d']),
                                    "correct_option" => $row['cc_correction_option']
                                );
                            }
                        }
                        return $questions;
                    }
                    
                    // Call the function to fetch questions
                    $questions = getQuestionsFromDatabase();
                    
                    $question_number = 1;
                    foreach ($questions as $question) {
                        $question_text = $question["question_text"];
                        $options = $question["options"];
                        
                        echo "<div class='card mb-4'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>Question $question_number</h5>";
                        echo "<p class='card-text'>$question_text</p>";
                        foreach ($options as $key => $option) {
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' name='answers[$question_number]' id='option$question_number$key' value='" . ($key + 1) . "'>";
                            echo "<label class='form-check-label' for='option$question_number$key'>$option</label>";
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "</div>";
                        
                        $question_number++;
                    }
                ?>
                <button type="submit" class="btn btn-primary float-end" id="endTestBtn">End Test</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    include 'footer.php';
?>
