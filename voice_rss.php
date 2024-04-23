<?php
include_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js"></script>

    <title>Convert Blog to Audio</title>
</head>
<body>
<?php
$sql = "SELECT * FROM tbl_course WHERE cc_course_id = 1";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    // Fetch blog content from the database
    $blogContent = $row['cc_course_description'];

    // Split the content into chunks
    $chunkSize = 1000; // Adjust this size as needed
    $chunks = str_split($blogContent, $chunkSize);

    // Process each chunk separately
    foreach ($chunks as $chunk) {
        // Convert chunk to audio
        $textToSpeechURL = 'https://api.voicerss.org/?key=cdccbb712dd6450d97935b13ffd3e193&hl=en-us&src=' . urlencode($chunk);

        // Output HTML5 audio player for each chunk
        echo '<audio controls>
                  <source src="' . $textToSpeechURL . '" type="audio/mpeg">
                  Your browser does not support the audio element.
              </audio>';
    }
}
?>

</body>
</html>
