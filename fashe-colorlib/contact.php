<?php
	include_once('PHPMailer-master/src/PHPMailer.php');
	include_once('PHPMailer-master/src/Exception.php');
	include_once('PHPMailer-master/src/OAuth.php');
	include_once('PHPMailer-master/src/POP3.php');
	include_once('PHPMailer-master/src/SMTP.php');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	/*-------------------------------------------------*/
	session_start();
	$host="localhost";
    $user="Phung";
    $pass="Phung1999";
    $dataname="onlineshop";
    $conn=mysqli_connect($host,$user,$pass,$dataname);
    mysqli_query($conn,"SET NAMES utf8");
    if(!$conn)
    	echo "Kết nối CSDL thất bại".mysqli_connect_error($conn);
    //----------------------------------------------------------
	if (isset($_POST['goi'])) 
	{
		$hoten=$_POST['name'];
		$phone=$_POST['phone-number'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		$hoten=trim($hoten);
		$phone=trim($phone);
		$email=trim($email);
		$message=trim($message);
		if ($hoten == "" || $email == "" || $message == "") 
		{
			$mess = "Vui lòng nhập thông tin ở phần bắt buộc (*) !";
		}
		else
		{	
			$query="INSERT INTO Contact(UserName,UserPhone,Email,Content) VALUES ('$hoten','$phone','$email','$message')";
			$result=mysqli_query($conn,$query);
			$nFrom = "Phụng Nguyễn";
			$mFrom = "trongphoenix@gmail.com";
			$mPass = "trongphung421999";
			$nTo   = "$hoten";
			$mTo   = "$email";
			$mail  = new PHPMailer();
			$body  = "Cảm ơn bạn đã góp ý cho website của chúng tôi giúp cho website ngày càng tốt hơn !";
			$tile  = "Thư phản hồi góp ý khách hàng";
			try
			{
				//server mail
				$mail->SMTPDebug = 2;// enables SMTP debug information (for testing)
				$mail->IsSMTP();      
				//Cài đặt mail sử dụng SMTP
				$mail->Host = 'relay-hosting.secureserver.net';
				$mail->Port       = 25; 
				$mail->SMTPAuth   = false;    // enable SMTP authentication
				$mail->SMTPSecure = 'SSL';   // sets the prefix to the servier	
				$mail->UserName = $mFrom;
				$mail->PassWord = $mPass; 			    	    
			    // gửi mail
			    $mail->CharSet  = "utf-8"; 
			    $mail->SetFrom($mFrom,$nFrom);
			    $mail->AddAddress($mTo,$nTo);
			    $mail->AddReplyTo('trongphoenix@gmail.com','Phụng Nguyễn');
			    // content mail 
			    $mail->isHTML(true);
			    $mail->Subject  = $tile;
			    $mail->Body     = $body;
			    $mail->Altbody  = '';
			    // send mail
			    if ($mail->Send()) 
			    {
			    	header('Location: homepage.php');
			    }
			}
			catch (Exception $e) 
			{
				
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Liên Hệ</title>
	<meta charset="UTF-8">
	<?php
		include_once('page/head.php');
	?>
</head>
<body class="animsition">

	<!-- Header -->
	<?php
		include_once('page/header.php');
	?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/blog.jpg);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="google_map" data-map-x="15.9724637" data-map-y="108.2478464" data-pin="images/icons/icon address.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form  method="POST">
						<h4 class="m-text26 p-b-36 p-t-15">
							Gởi lời nhắn của bạn
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Họ và tên *">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="tel" name="phone-number" placeholder="Số điện thoại">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email *">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Nội dung *"></textarea>
						&nbsp;&nbsp;&nbsp;
						<?php
							if (isset($mess)) 
							{
								echo $mess;
							}
							else
							{
								echo "";
							}
							mysqli_close($conn);
						?>
						&nbsp;&nbsp;&nbsp;
						<div class="w-size25">
							<!-- Button -->
							<input type="submit" value="Gởi" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="goi">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<?php
		include_once('page/footer.php');
	?>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
