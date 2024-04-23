<?php
    include('conn.php');
    $msg="";
    session_start();
    if(!isset($_SESSION['useradmin']))
    {
        header("location:login.php");
    }
    if(isset($_POST['btnsub']))
    {
        $inm=$_POST['inm'];
        $estdt=$_POST['estdt'];
        $cmbstate=$_POST['cmbstate'];
        $cmbcity=$_POST['cmbcity'];
        $cmbsector=$_POST['cmbsector'];
        $doj=$_POST['doj'];
        $ielg=$_POST['ielg'];
        $idesc=$_POST['idesc'];
        $iadmi=$_POST['iadmi'];
        $ilink=$_POST['ilink'];
        $iaddr=$_POST['iaddr'];
        $ilgaddr=$_POST['ilgaddr'];
        $icutoff=$_POST['icutoff'];
        $emailid=$_POST['emailid'];
        $mobnum=$_POST['mobnum'];
        $iimg=$_FILES['iimg']['name'];
        $tmp_fnm=$_FILES['iimg']['tmp_name'];    
        $target="images/".basename($_FILES['iimg']['name']);
        move_uploaded_file($tmp_fnm,$target);
        $iplmnt=$_FILES['iplmnt']['name'];
        $tmp_fnm1=$_FILES['iplmnt']['tmp_name'];    
        $target1="placementreport/".basename($_FILES['iplmnt']['name']);
        move_uploaded_file($tmp_fnm1,$target1);
   //     echo "$inm<br>$estdt<br>$cmbstate<br>$idesc<br>$iaddr<br>$ielg<br>$ilgaddr";
//        $sql2="insert into tbl_institute(cc_ins_name,cc_ins_establish,cc_ins_sector_id,cc_ins_doj,cc_ins_desc,cc_ins_eligibilty,cc_ins_admission,cc_state_id,cc_city_id,cc_ins_link,cc_ins_address,cc_ins_logical_add,cc_ins_cutoff,cc_ins_placement_report,cc_ins_email_id,cc_ins_contact,cc_ins_img) values ('$inm','$estdt',$cmbsector,'$doj','$idesc','$ielg','$iadmi',$cmbstate,$cmbcity,'$ilink','$iaddr','$ilgaddr','$icutoff','$iplmnt','$emailid',$mobnum,'$iimg')";
        $sql2="insert into tbl_institute(cc_ins_name,cc_ins_establish,cc_ins_sector_id,cc_ins_doj,cc_ins_desc,cc_ins_eligibilty,cc_ins_admission,cc_state_id,cc_city_id,cc_ins_link,cc_ins_address,cc_ins_logical_add,cc_ins_cutoff,cc_ins_placement_report,cc_ins_email_id,cc_ins_contact,cc_ins_img) values ('$inm','$estdt',$cmbsector,'$doj','$idesc','$ielg','$iadmi',$cmbstate,$cmbcity,'$ilink','$iaddr','$ilgaddr',$icutoff,'$iplmnt','$emailid',$mobnum,'$iimg')";
 //       print_r($sql2);
        $res2=mysqli_query($conn,$sql2);
        echo "<br>";

     //   echo $res2;
        if($res2==1)
        {
            $msg="Record Inserted Successfully";
        }
        else
        {
            $msg="Record is not inserted";
        }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
    .clri {
      background-color: #378CE7;
      background-size: cover;
      background-repeat: no-repeat;
    }
    </style>

</head>
<body class="clri">
<div class="row">
    <div class="col-md-2">
        <?php
            include('admin_nav_bar.php');
        ?>
    </div>
    <div class="col-md-10">

        <form method="post" class="was-validated" enctype="multipart/form-data">
        <br>
        <br>
            <div class="card bg-white p-3 m-5">
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <h3 align="center">Insert New Institute</h3>
                    <hr>
                    <br>
                    <input type="text" pattern="[a-zA-Z & ]{5,400}" placeholder="Enter Institute Name" class="form-control" required name="inm">
                    <div class="invalid-feedback">Enter Institute Name</div>                
                    <br>
                    <input type="text" placeholder="Enter Date/Year of establishment" class="form-control" required name="estdt">
                    <div class="invalid-feedback">Enter Date of establishment</div>
                    <br>
                    <select class="form-select" id="cmbsector" name="cmbsector" required>
                        <option disabled value="" selected>Select Sector</option>
                        <?php
                            $sql1="select * from tbl_sector";
                            $res1=mysqli_query($conn,$sql1);
                            while($row1=mysqli_fetch_assoc($res1))
                            {
                        ?>
                        <option value="<?php echo $row1['cc_sector_id'];?>"><?php echo $row1['cc_sector_name'];?></option>
                        <?php
                            }        
                        ?>
                    </select>
                    <div class="invalid-feedback">Select the sector</div>
                    <br>
                    <input type="date" required name="doj" class="form-select">
                    <div class="invalid-feedback">Select the date of joining of Institute</div>
                    <br>
                    About Institute
                    <textarea name="idesc" rows=4 class="form-control" required></textarea>
                            <div class="invalid-feedback">Enter Institute Description</div>
                    <br>
                    Eligibility
                    <textarea name="ielg" rows=4 class="form-control" required></textarea>
                            <div class="invalid-feedback">Enter Eligibility Criteria</div>
                    <br>
                    <input type="text" class="form-control" required name="iadmi" placeholder="Enter Admission details">
                    <div class="invalid-feedback">Enter details about admission date</div>
                    <br>
                    <select id="cmbstate" class="form-select" required name="cmbstate">
                            <option value="" disabled selected>Select State</option>
                            <?php
                                $sql10="select * from tbl_state";
                                $res10=mysqli_query($conn,$sql10);
    
                                while($row10=mysqli_fetch_assoc($res10))
                                {
                            ?>
                            <option value="<?php echo $row10['cc_state_id'] ?>"><?php echo $row10['cc_state_name']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                    <br>
                    <div class="invalid-feedback">Select your state</div>
                    <select class="form-select" id="cmbcity" required name="cmbcity">
                                <option value="" disabled selected>Select City</option>
                    </select>
                    <script>
                                $(document).ready(function(){
                                $('#cmbstate').change(function(){
                                var sid=$(this).val();
                                    $.ajax({
                                        type:"POST",
                                        url:"admin_reg_cityfromstate.php",
                                        data:{ "state":sid},
                                        success: function(result){
                                            $('#cmbcity').html(result);
                                            }
                                        });
                                    });
                                });
                    </script>
                    <br>
                    <input type="text" class="form-control" placeholder="Enter institute website link" required name="ilink">
                    <div class="invalid-feedback">Enter the link</div>
                    <br>
                    Institute Address:
                    <textarea name="iaddr" rows=4 class="form-control"  required></textarea>
                            <div class="invalid-feedback">Enter Complete Institute Address</div>
                    <br>
                    Institute Logical Address
                    <textarea name="ilgaddr" rows=4 class="form-control" required></textarea>
                            <div class="invalid-feedback">Enter Complete Institute Logical Address</div>
                    <br>
                    <input type="text" placeholder="00.00" name="icutoff" class="form-control" pattern="[0-9\.]{5}" required>
                    <div class="invalid-feedback">Enter Cutoff details</div>
                    <br>
                    <input type="file" name="iplmnt" class="form-control" required>
                    <div class="invalid-feedback">Select Placement Report</div>
                    <br>

                    <input type="text" class="form-control" name="emailid" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter your Email ID" required>
                   <div class="invalid-feedback">Please Enter a valid Email ID</div>
                    <br>
                    <input type="text" class="form-control" name="mobnum" pattern="[6789][0-9]{9}" placeholder="Enter your mobile number" required>
                            <div class="invalid-feedback">Please Enter a valid mobile number</div>
                    <br>
                    <input type="file" name="iimg" class="form-control" required>
                    <div class="invalid-feedback">Select Institute Image</div>
                    <br>
                    <h5><?php echo $msg;?></h5>
                    <br>
                    <input type="submit" class="btn btn-dark" name="btnsub">
                </div>
            <div class="col-md-2"></div>    
            </div>


       
            </div>
        <br>
    </div>
</div>
</body>
</html>
