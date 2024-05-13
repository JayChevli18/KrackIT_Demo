<?php
include 'conn.php'; // Include your database connection file
session_start();
date_default_timezone_set("Asia/Calcutta");
$user_email_id=$_SESSION['user'];
// Check if the necessary POST data is received
if (isset($_POST['amount']) && isset($_POST['product_id'])) {
    // Sanitize and validate input data
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $productid = mysqli_real_escape_string($conn, $_POST['product_id']);
    $currentDateTime = date('Y-m-d H:i:s');
//    echo $currentDateTime;
    // Perform the insert query

    $sql1="select * from tbl_purchased_mock_test where cc_exam_id=$productid and cc_user_email_id='$user_email_id'";
    $res1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($res1)>0)
    {
        echo "Already Purchased";
    }    
    else
    {

        $sql = "INSERT INTO tbl_purchased_mock_test VALUES (null, '$user_email_id', $productid, '$currentDateTime', $amount)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 'done';
        } else {
            echo 'Insert failed: ' . mysqli_error($conn);
        }
    }
} else {
    echo 'Error: Required data not received';
}
?>
