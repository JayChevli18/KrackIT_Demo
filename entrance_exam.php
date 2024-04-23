<?php include 'navbar.php'; ?>

<?php
    include('conn.php');
//    session_start();
    $cnm="";
    $msg="";
    // if(!isset($_SESSION['user']))
    // {
    //     header("location:loginpro.php");
    // }
    if(isset($_POST['btnsearch']))
    {
      $cnm=$_POST['cnm'];
      $sql1="select * from tbl_entrance_exam where cc_exam_name like '%{$cnm}%'";
      $res1=mysqli_query($conn,$sql1);
      $rec=mysqli_num_rows($res1);
      if($rec==0)
      {
        $msg="Sorry! Record Not Found";
      }
    }

?>


<head>
<script>
$(document).ready(function(){
	var maxLength = 85;
	$(".show-read-more").each(function(){
    
		var myStr = $(this).text();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append('<br/><a class="read-more" href="#">read more...</a>');
		}
	});
	$(".read-more").click(function(){
	  var cid=$(this).parent().attr('data-cid');
    window.location="entrance_exam_details.php?examid="+cid;
  });
});
</script>
  <style>
     .show-read-more .more-text{
        display: none;
    }
    .x{
      color:black;
    }
  </style>
</head>


<section class="section-padding hero-section">
  <form method="post">
      <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6">
              <!-- <input type="text" name="cnm" class="form-control"> -->
            </div>
            <!-- <div class="col-md-4"><input type="submit" class="btn btn-dark" value="search" name="btnsearch"></div> -->
            <h2 align="center" style="color:white"><?php echo $msg;?></h2>
            <?php
            $sql="select * from tbl_entrance_exam";
            if($cnm!=null)
            {
              $sql.=" where cc_exam_name like '%{$cnm}%'";
            }
            $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res))
            {
            ?>
            
            <div class="col-md-3">
                <br>
                <br>
            <div class="card bg-white">
                <br>
            <img width="258px" height="201px" src="images/<?php echo $row['cc_exam_logo']; ?>"></img>
            <?php
                $cid=$row['cc_exam_id'];
                echo "<br><h6><a class='x' href='entrance_exam_details.php?examid=$cid'> ".$row['cc_exam_name']."</a></h6><hr>";
                echo "<p class='show-read-more' data-cid=$cid>".$row['cc_exam_about']."</p>";
            ?>
            </div>
            </div>
            <?php
            }
            ?>
                    </div>
</form>
</section>


  
<?php
    include 'footer.php';
?>

