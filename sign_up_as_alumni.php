<?php include 'navbar.php'; ?>

<?php
    include('conn.php');
    $msg="";
    if(isset($_POST['btnsub']))
    {
        $degreefile=$_FILES['degreefile']['name'];
        $tmp_fnm=$_FILES['degreefile']['tmp_name'];    
        $target="degreefile/".basename($_FILES['degreefile']['name']);
        move_uploaded_file($tmp_fnm,$target);
        

        $fnm=$_POST['fnm'];
        $mobnum=$_POST['mobnum'];
        $dob=$_POST['dob'];
        $degree=$_POST['course'];
        $field=$_POST['dept'];
        $emailid=$_POST['emailid'];
        $gradyear=$_POST['gradyear'];
        $ins=$_POST['ins'];
//        $degreefile=$_POST['degreefile'];
        $gender=$_POST['gender'];
        $pswd=$_POST['pswd'];
        $cnfrmpswd=$_POST['cnfrmpswd'];
        if($pswd!=$cnfrmpswd)
        {
            $msg="Password and Confirm Password should be same!";
        }
        else
        {
            $epass=base64_encode($pswd);       
            $sql1="select cc_email_id from tbl_login where cc_email_id='$emailid'";
            $res1=mysqli_query($conn,$sql1);
            $rec=mysqli_num_rows($res1);
            if($rec==1)
            {
                $msg="Email ID is already registered";
            }
            else
            {
                $sql0="insert into tbl_login values ('$emailid', '$epass', 2)";
                $res0=mysqli_query($conn,$sql0);
                $sql="insert into tbl_alumni(alumni_name,alumni_dob,alumni_mob,alumni_email_id,alumni_institute,alumni_dept,alumni_degree,alumni_grad_year,alumni_degree_file,alumni_gender,alumni_password) values('".$fnm."','".$dob."',".$mobnum.",'".$emailid."',".$ins.",".$field.",".$degree.",".$gradyear.",'".$degreefile."','".$gender."','".$epass. "')";
                $res=mysqli_query($conn,$sql);
                echo "<script>window.location.href='login.php'</script>";
            }
        }
    }
?>

<head>
<title>Signup-Alumni</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<section class="section-padding hero-section">

  <form method="post" class="was-validated" enctype="multipart/form-data">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <br>    
                    <h1 align="center"><i class="fa fa-solid fa-user-large"></i></h1>
                    <br>
                    <h3 align="center">User Registration</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Full Name:</h6>
                            <input type="text" name="fnm" placeholder="Enter Full Name" pattern="[a-z A-Z]{10,300}" required class="form-control">
                            <div class="valid-feedback">Valid!</div>
                            <div class="invalid-feedback">Please enter your Full name and it should contain atleast 10 alphabets.</div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Date of Birth:</h6>
                            <input type="date" class="form-control" name="dob" placeholder="Select Date Of Birth" required>
                            <div class="invalid-feedback">Please Select your birthdate</div>
                            <div class="valid-feedback">Valid!</div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Mobile Number</h6>
                            <input type="text" class="form-control" name="mobnum" pattern="[6789][0-9]{9}" placeholder="Enter your mobile number" required>
                            <div class="valid-feedback">Valid!</div>
                            <div class="invalid-feedback">Please Enter a valid mobile number</div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Email ID</h6>
                            <input type="text" class="form-control" name="emailid" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter your Email ID" required>
                            <div class="valid-feedback">Valid!</div>
                   <div class="invalid-feedback">Please Enter a valid Email ID</div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <!-- <div class="col-sm-6">
                        <h6>Password</h6>
                            <input type="password" class="form-control" placeholder="Enter your password" name="pswd" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*<>?/.,;]{7,20}$" required>
                            <div class="invalid-feedback">Please Enter atleast 7 digit password(Max-20). Also include alphabets,number and special characters </div>
                        </div>
                        -->
                        <div class="col-sm-6">
                        <h6>Institute</h6>
                            <select id="ins" name="ins" class="form-select" required>
                                <option value="" disabled selected>Select Institute</option>
                                <?php
                                $sql="select * from tbl_institute";
                                $res=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($res))
                                {
                                ?> 
                                <option value="<?php echo $row['cc_ins_id'];?>"><?php echo $row['cc_ins_name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">Select your Institute</div>
                            <div class="valid-feedback">Valid!</div>    

                        </div>

                        <div class="col-sm-6">
                            <h6>Field</h6>
                            <select id="dept" name="dept" class="form-select" required>
                                <option value="" disabled selected>Select Department</option>
                                <?php
                                $sql="select * from tbl_dept";
                                $res=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($res))
                                {
                                ?> 
                                <option value="<?php echo $row['cc_dept_id'];?>"><?php echo $row['cc_dept_name'];?></option>
                                <?php
                                }
                                ?>
                            </select>

                            <div class="invalid-feedback">Select your Field</div>
                            <div class="valid-feedback">Valid!</div>    
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Degree</h6>
                            
                            <select id="course" name="course" class="form-select" required>
                                <option value="" selected disabled>Select Course</option>
                            </select>
                            <script>
                                $(document).ready(function(){
                                $('#dept').change(function(){
                                    var deptid=$(this).val();
                                    $.ajax({
                                        type:"POST",
                                        url:"userdeptcourse.php",
                                        data:{ "dept":deptid},
                                        success: function(result){
                                            //console.log(res)
                                            $('#course').html(result);
                                        }
                                        });
                                    });
                                });
                            </script>

                            

                            <div class="invalid-feedback">Select your Degree</div>
                            <div class="valid-feedback">Valid!</div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Graduation Year</h6>
                            <!-- <input type="text" placeholder="Enter Graduation Year" name="gradyear" class="form-control" required> -->

                                                        
                            <select id="gradyear" name="gradyear" class="form-select" required>
                                <option value="" selected disabled>Select Graduation Year</option>
                            </select>

                            <script>
                                $(function() {
                                    var option = function(i, j) {
                                        return $("<option>").append(j + 2010);
                                    };

                                    var options = (new Array(14) + "").split(",").map(option);

                                    $("#gradyear").append(options);
                                    });
                            </script>

                            <div class="valid-feedback">Valid!</div>
                            <div class="invalid-feedback">Select Your Graduation Year</div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Degree File</h6>
                            <input type="file" name="degreefile" class="form-control" required>
                            <div class="invalid-feedback">Upload Your Degree(PDF,PNG,etc.)</div>
                            <div class="valid-feedback">Valid!</div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Gender</h6>
                            <input type="radio" required name="gender" class="form-check-input" value="Male">Male
                            <input type="radio" required name="gender" class="form-check-input" value="Female">Female
                            <div class="invalid-feedback">Select your gender</div>
                        
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Password</h6>
                            <input type="password" class="form-control" placeholder="Enter your password" name="pswd" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*<>?/.,;]{7,20}$" required>
                            <div class="invalid-feedback">Please Enter atleast 7 digit password(Max-20). Also include alphabets,number and special characters </div>
                        </div>
                        <div class="col-sm-6">
                            <h6>Confirm Password</h6>
                            <input type="password" class="form-control" placeholder="Enter your password" name="cnfrmpswd" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*<>?/.,;]{7,20}$" required>
                            <div class="invalid-feedback">Please Re-Enter your Password </div>                        
                        </div>
                    </div>
                    <br>
                    <h4 align="center"><?php echo $msg; ?></h4>
                </div>
                <br>
                <div class="card-footer">
                    <div class="row">    
                        
                         <div class="col-sm-12" align="center"> 
                           <br>
                            <button class="btn btn-outline-dark btn-lg px-6" type="submit" name="btnsub">Sign Up</button>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

</form>

</section>

<?php include 'footer.php'; ?>