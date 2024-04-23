<?php
    $nm="";
    include('conn.php');
    $sql="select * from tbl_register where cc_user_id=3";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($res))
    {
        $nm=$row['cc_user_name'];
    }
    $sql2="select * from tbl_state";
    $res2=mysqli_query($conn,$sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input name="nm" type="text" id="nm" value="<?php echo $nm; ?>">

    <select name="courseName">
    <option>Select Course</option>
    <?php 
    while($rows=mysqli_fetch_assoc($res2)) {
    ?>
    <option value="<?php echo $rows['cc_state_name']; ?>"><?php echo $rows['cc_state_name']; ?> </option>
    <?php 
    }
   ?>
</select>
</body>
</html>

