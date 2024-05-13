<?php
include('conn.php');
session_start();

if(!isset($_SESSION['user'])) {
    header("location:login.php");
    exit; // Add exit to stop further execution
}
include 'navbar.php'; 
?>

<!-- Header Section -->
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Result</li>
                    </ol>
                </nav>
                <h2 class="text-white">Test Result</h2>
            </div>
        </div>
    </div>
</header>

<!-- Result Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <?php
                        // Process the selected answers and calculate total marks
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $answers = $_POST['answers'];
                            $totalMarks = 0;

                            // Iterate through the submitted answers and calculate total marks
                            foreach ($answers as $question_id => $selected_option) {
                                // Fetch the correct option from the database using question ID
                                $correct_option = getCorrectOption($question_id);
                                // Convert numeric selected option to alphabetic ('a', 'b', 'c', 'd')
                                $selected_option = convertToAlphabetic($selected_option);
                                if ($selected_option == $correct_option) {
                                    $totalMarks++; // Increment total marks for correct answer
                                }
                            }

                            // Display total marks
                            echo "<h3 class='card-title text-center mb-4'>Your Score</h3>";
                            echo "<div class='total-score text-center mb-4' style='background-color: #4CAF50; color: white; padding: 20px; border-radius: 10px;'>";
                            echo "<h1 class='display-1'>$totalMarks</h1>";
                            echo "<p style='color:black' >out of 30 questions</p>";
                            echo "</div>";
                        }

                        // Function to fetch correct option from the database
                        function getCorrectOption($question_id) {
                            global $conn;
                            $sql = "SELECT cc_correction_option FROM tbl_test_questions WHERE cc_q_id = $question_id";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            return $row['cc_correction_option'];
                        }

                        // Function to convert numeric selected option to alphabetic ('a', 'b', 'c', 'd')
                        function convertToAlphabetic($selected_option) {
                            switch ($selected_option) {
                                case 1:
                                    return 'a';
                                    break;
                                case 2:
                                    return 'b';
                                    break;
                                case 3:
                                    return 'c';
                                    break;
                                case 4:
                                    return 'd';
                                    break;
                                default:
                                    return ''; // Handle invalid option
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
