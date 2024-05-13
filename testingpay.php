<?php
  include('conn.php');
  session_start();
  include 'navbar.php';

  $user_id="";
  $msg2="";
  $inm="";
  $user_email_id=$_SESSION['user'];
  if(isset($_POST['buy_now']))
  {
    //productid:

    if(!isset($_SESSION['user']))
    {
      echo "<script>window.location.href='login.php'</script>";
    }
    echo $user_email_id;
    $exam_id=$_POST['add_to_cart'];
    echo $exam_id."<br>";
    
    $sql="select * from tbl_entrance_exam where cc_exam_id=$exam_id";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);

    $price =  $row['cc_price'];

    $sql2="select cc_user_id from tbl_user_register where cc_email_id='$user_email_id'";
    $res2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($res2);

    $user_id=$row2['cc_user_id'];


    $sql1="insert into tbl_purchased_mock_test values(null,'$user_id','$exam_id','','$price')";
    $res1=mysqli_query($conn,$sql1);
    if($res1)
    {
      echo "Success";
    }
    else
    {
      echo "Failed";
    }
  }


?>


<head>
  <title>Mock</title>

  <style>
    a{
      color:black;
    }
    .table-hover tbody tr:hover td, h5{
  color:black;
}

.table-hover tbody tr:hover a , h3:hover{
  color:#00008B;
}
.table-hover tbody tr:hover a:hover{
  color:blue;
}


.text-with-margin {
            margin-top: 50px;    /* Top margin */
            margin-right: 100px;  /* Right margin */
            /* Bottom margin */
            margin-left: 50px;   /* Left margin */
}
  </style>
 </head>

<h1 class="text-with-margin"> Mock Test List :</h1>

<section class="section-padding">

<form method="post"> 
  <br>
  <br>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        </div>
    </div>
    <div class="card bg-white m-5 p-3">
        <div class="container">
            <div class="row">
              <br>
            <h2 align="center" style="color:black"><?php echo $msg2;?></h2>
       
              <table class="table table-hover">
               <tbody>
          
                        <?php
                            $sql="select * from tbl_entrance_exam";
                            if($inm!=null)
                            {
                              $sql.=" where cc_exam_id '";
                            }
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                        ?>
                        
                        <tr>
                        <td width=20% align="center"><br><img align="center" width="285px" height="201px" src="images/<?php echo $row['cc_exam_logo'];?>"></img></td>
                        <td align="center"> <br><h3><a href="mock_speci.php?examid=<?php echo $row['cc_exam_id'];?>"><?php echo $row['cc_exam_name'];?> Mock Test Package</a></h3>
                        <?php 
                       $snm=$row['cc_full_form'];
                       $price=$row['cc_price'];
                      ?>
                      <br>
                      <p>
                      <?php echo $snm;?><br>
                      </p>
                      <h5>
                      Rate: <?php echo $price;?>
                      </h5>
                      <br>
                      <!-- <button type="submit" href="javascript:void(0)"  name="add_to_cart"  class="btn custom-btn mt-2 mt-lg-3 buynow" value="<?php  echo $row['cc_exam_id'];?>" >Add TO CART</button> -->
                      <a href="javascript:void(0)" data-productid="<?php echo $row['cc_exam_id'];?>" data-productname="<?php echo $row['cc_exam_name'];?>" data-amount="<?php echo $row['cc_price'];?>" class="btn btn-primary buynow">Buy Now</a>

                         
                    </td>                                                            
                  </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>

$(".buynow").click(function()
{

var amount=$(this).attr('data-amount');	
var productid=$(this).attr('data-productid');	
<?php
        // $sql1="insert into tbl_purchased_mock_test values(null,'$user_email_id',productid,'',amount)";
        // $res1=mysqli_query($conn,$sql1);
?>

var productname=$(this).attr('data-productname');	
	
var options = {
    "key": "rzp_test_6xGIAhO53petJ7", // Enter the Key ID generated from the Dashboard
    "amount": 99999, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "name": "The Digital Oceans",
    "description": productname,
    "image": "https://example.com/your_logo",
    "handler": function (response){
        var paymentid=response.razorpay_payment_id;
		$.ajax({
			url:"payment_process.php",
			type:"POST",
			data:{product_id:productid,amount:amount},
			success:function(finalresponse)
			{
                console.log(finalresponse); 
				// if(finalresponse=='done')
				// {
				// 	window.location.href="http://localhost/php-practical-work/payment-gateway/razorpay/success.php";
				// }
				// else 
				// {
				// 	alert('Please check console.log to find error');
				// 	console.log(finalresponse);
				// }
			}
		})
		
        
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
 rzp1.open();
 e.preventDefault();
});
</script>
</section>
