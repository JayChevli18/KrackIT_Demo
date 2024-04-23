<div class="row">
                <div class="col-md-12">
          
<br>
<br>
<!-- <table class="table table-stripped table-hover bg-black">
            <thead class="text-white">
                <th>ID</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Email ID</th>
                <th>Mobile No</th>
                <th>Gender</th>
                <th>State</th>
                <th>City</th>
                <th>Pincode</th>
                <th>Address</th>
            </thead>
            <tbody class="text-white">
                
                <?php
                    include('conn.php');
                    $sql="select * from tbl_user_register";
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($res))
                    {
                ?>
                <tr>
                    <td><?php echo $row['cc_user_id']; ?></td>
                     <td><?php echo $row['cc_user_name'];?></td>
                     <td><?php echo $row['cc_dob'];?></td>
                     <td><?php echo $row['cc_email_id'];?></td>
                     <td><?php echo $row['cc_mob_no'];?></td>
                     <td><?php echo $row['cc_gender'];?></td>
                     <?php
                        $sql1="select * from tbl_state where cc_state_id=$row[cc_state_id]";
                        $res1=mysqli_query($conn,$sql1);
                        while($row1=mysqli_fetch_assoc($res1))
                        {
                     ?>
                     <td><?php echo $row1['cc_state_name'];?></td>
                     <?php
                        }
                        $sql2="select * from tbl_city where cc_city_id=$row[cc_city_id]";
                        $res2=mysqli_query($conn,$sql2);
                        while($row2=mysqli_fetch_assoc($res2))
                        {
                     ?>
                     <td><?php echo $row2['cc_city_name'];?></td>
                     <?php
                        }
                     ?>
                     <td><?php echo $row['cc_pincode'];?></td>
                     <td><?php echo $row['cc_address'];?></td>
                <?php
                    }
                ?>
                </tr>
            </tbody>
        </table> -->
        </div>
    </div>