<?php
    include_once('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert Blog to Audio</title>
</head>
<body>
<?php
    $sql="select * from tbl_course where cc_course_id=1";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
?>
    <div id="blogContent">
        <?php echo $row['cc_course_description']; } ?>
    </div>

    <button id="convertBtn">Listen to Audio</button>
    <button id="stopBtn" style="display: none;">Stop</button>
    
    <script>
        var synth = window.speechSynthesis;
        var utterance = null;
        var content = document.getElementById("blogContent").innerText;
        var currentPosition = 0;

        // Function to convert blog content to audio
        function convertToAudio() {
            if (!synth.speaking) {
                utterance = new SpeechSynthesisUtterance(content.substring(currentPosition));
                synth.speak(utterance);
                document.getElementById("convertBtn").style.display = "none";
                document.getElementById("stopBtn").style.display = "inline";
            }
        }

        // Function to stop the audio
        function stopAudio() {
            if (synth.speaking) {
                synth.cancel();
                currentPosition = utterance ? utterance.charIndex : 0;
                document.getElementById("convertBtn").style.display = "inline";
                document.getElementById("stopBtn").style.display = "none";
            }
        }

        // Event listener for the end event
        synth.onend = function() {
            currentPosition = 0; // Reset position when audio ends
            document.getElementById("convertBtn").style.display = "inline";
            document.getElementById("stopBtn").style.display = "none";
        };

        // Add event listener to the convert button
        document.getElementById("convertBtn").addEventListener("click", convertToAudio);

        // Add event listener to the stop button
        document.getElementById("stopBtn").addEventListener("click", stopAudio);
    </script>
</body>
</html>
