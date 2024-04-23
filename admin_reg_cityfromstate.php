<?php
	include('conn.php');
	$sid=$_POST['state'];
	$sql="select * from tbl_city where cc_state_id=$sid";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{			
	?>
	<option value="<?php echo $row['cc_city_id'];?>"><?php echo $row['cc_city_name'];?></option>
	<?php
	}
?>