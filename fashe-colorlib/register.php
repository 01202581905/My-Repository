<?php
	session_start();
    $host="localhost";
    $userhost="Phung";
    $passhost="Phung1999";
    $dataname="onlineshop";
    $conn=mysqli_connect($host,$userhost,$passhost,$dataname);
    mysqli_query($conn,"SET NAMES utf8");
    if(!$conn)
    	echo "Kết nối CSDL thất bại".mysqli_connect_error($conn);
?>
<?php
	if (isset($_SESSION['username'])) 
	{
		header('Location: homepage.php');
	}
?>
<?php
	if (isset($_POST['dangky'])) 
	{
		$userres = $_POST['user_name'];
		$passres = $_POST['pass_word'];
		$confirmres = $_POST['confirm'];
		$userres = trim($userres);
		$passres = trim($passres);
		$confirmres = trim($confirmres);
		if ($userres == "" || $passres == "" || $confirmres == "") 
		{
			$mes = "Vui lòng điền đầy đủ thông tin";
		}
		elseif(isset($userres) && isset($passres) && isset($confirmres)) 
		{
			$qr = mysqli_query($conn,"SELECT UserName FROM member WHERE UserName ='$userres'");
			$count = mysqli_num_rows($qr);
			if ($count >= 1) 
			{
				$mes = "Tên tài khoản đã tồn tại. Vui lòng sử dụng tên khác";
			}
			elseif($count == 0)
			{
				if (strlen($userres) <= 5 or strlen($userres > 30)) 
				{
					$mes = "Tên tài khoản quá dài hoặc quá ngắn";
				}
				else
				{
					if (strlen($passres) <= 6 or strlen($passres > 30)) 
					{
						$mes = "Mật khẩu quá dài hoặc quá ngắn";
					}
					else
					{
						if ($passres === $confirmres) 
						{
							$query = "INSERT INTO member(UserName,PassWord) VALUES ('$userres','$passres')";
							$result = mysqli_query($conn,$query);
							header('Location: login.php');
						}
						else
						{
							$mes = "Xác nhận mật khẩu không đúng !";
						}
					}
				}
			}

		}
		else
		{
			$mes = "";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Ký</title>
	<meta charset="UTF-8">
	<?php
		include_once('page/head.php');
	?>
<!--===============================================================================================-->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!--===============================================================================================-->
	<style type="text/css">
		.panel-heading {
    padding: 5px 15px;
}

.panel-footer {
	padding: 1px 15px;
	color: #A0A0A0;
}

.profile-img {
	width: 96px;
	height: 96px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
}
	</style>
<!--===============================================================================================-->
</head>
<body class="animsition">
	<?php
		include_once('page/header.php');
	?>
	<div class="wrapper fadeInDown">
			<div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Đăng Ký Tài Khoản</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="#" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											src="images/icons/login.png">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" placeholder="Tên tài khoản..." name="user_name" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" placeholder="Mật khẩu..." name="pass_word" type="password">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" placeholder="Xác nhận mật khẩu" name="confirm" type="password">
											</div>
										</div>
										<div class="form-group">
											<?php
												if (isset($mes)) 
												{
													echo $mes;
												}
												else
												{
													echo " ";
												}
												mysqli_close($conn);
											?>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Đăng Ký" name="dangky">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Bạn đã có tài khoản ? <a href="login.php" onClick=""> Đăng nhập tại đây ! </a>
					</div>
                </div>
			</div>
		</div>
	</div>
		</div>
	<?php
		include_once('page/footer.php');
	?>
<!--===============================================================================================-->
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
	<script src="js/main.js"></script>

</body>
</html>