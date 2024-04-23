<?php
	include('conn.php');
	$sid=$_POST['dept'];
	$sql="select * from tbl_course where cc_dept_id=$sid";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{			
?>
	<option value="<?php echo $row['cc_course_id'];?>"><?php echo $row['cc_course_name'];?></option>
<?php
	}

?>