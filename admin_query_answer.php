<?php
    include('conn.php');
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 

    require 'vendor/autoload.php';

    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }    
    $msg="";
    $qid=$_GET['queryid'];
    $sql="select * from tbl_query where cc_query_id=$qid";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);

    if(isset($_POST['btnsub']))
    {
        $qans=$_POST['qans'];
        $sql1="update tbl_query set cc_query_ans='$qans' where cc_query_id=$qid";
        $res1=mysqli_query($conn,$sql1);
        if($res1==1)
        {
            header("location:admin_query.php");
            $msg="Answer has been sent successfully";
        }
        else
        {
            $msg="Message is not sent! Please try again.";
        }
        $qdesc=$row['cc_query_description'];
        $qemail=$row['cc_query_email'];

        $message_body = $qdesc;
        $mail = new PHPMailer;
    
        //$toemail=$_POST['usnm'];	
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'jconeseven@gmail.com';          // SMTP username
        $mail->Password = 'vzzkwyybxaavlyuc'; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                          // TCP port to connect to
        $mail->setFrom('jconeseven@gmail.com', 'jc oneseven');
        $mail->addReplyTo('jconeseven@gmail.com', 'jc oneseven');
        $mail->addAddress($qemail);   // Add a recipient
    
        $mail->isHTML(true);  // Set email format to 
        $mail->Subject ="Query";
        $mail->Body = "<h2 align='center'>Career Counselling</h2><br><h3>Your Query:</h3>".$qdesc."<br><h3>Your Answer: </h3>".$qans;
        $mail->send();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .clri {
      background-color: #378CE7;
      background-size: cover;
      background-repeat: no-repeat;
    }
    </style>

</head>
<body class="clri">
<div class="row clri">
    <div class="col-md-2">
        <?php
            include('admin_nav_bar.php');
        ?>
    </div>
    <div class="col-md-10">

    <form method="post" enctype="multipart/form-data" class="was-validated">
        <br>
        <br>
        <div class="card bg-white p-3 m-5">
            <br>
        <div class="container" align="center">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h3 align="center">Query</h3>
                    <hr>
                    <table class="table" width=100%>
                        <tr>
                            <br><br>
                        </tr>
                        <tr>
                            <td width=40%>User Name</td>
                            <td><input type="text" value="<?php echo $row['cc_query_username']; ?>" name="qusnm" class="form-control" disabled></td>
                        </tr>
                        <tr>
                            <td width=40%>Email ID</td>
                            <td><input type="text" value="<?php echo $row['cc_query_email']; ?>" name="qemail" class="form-control" disabled></td>
                        </tr>
                        <tr>
                            <td width=40%>Query</td>
                            <td><textarea name="qdesc" class="form-control" rows=4 disabled><?php echo $row['cc_query_description'];?></textarea></td>
                        </tr>
                        <tr>
                            <td width=40%>Your Answer</td>
                            <td><textarea name="qans" class="form-control" rows=4 required></textarea></td>
                            <div class="invalid-feedback">Enter your answer!</div>
                        </tr>
                        
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
            <br>
            <h5>
            <?php echo $msg;?>
            </h5>
            <br>
            <button type="submit" name="btnsub" class="btn btn-primary">Submit</button>
            <hr>
        </div>

        </div>
</form>
</div>
</body>
</html>


