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

	if (isset($_POST['dangnhap'])) 
    { 
    	$user = $_POST['username'];
    	$user = trim($user);
    	$pass = $_POST['password'];
    	$pass = trim($pass);
    	if ($user == "" || $pass == "") 
    	{
    		$mess="Vui lòng nhập tài khoản và mật khẩu";
    	}
    	elseif (isset($_POST['username']) && isset($_POST['password'])) 
    	{
    		$query="SELECT UserName,PassWord FROM member WHERE UserName='$user' ";
    		$result=mysqli_query($conn,$query);
    		$obj=mysqli_fetch_object($result);
    		if ($obj->UserName != $user)
    		{
    			$mess="Tên tài khoản không tồi tại !";
    		}
    		elseif ($obj->UserName == $user) 
    		{
    			if ($obj->PassWord == $pass) 
    			{
    				$mess="Đăng nhập thành công !";
    					$re= $_POST['remember'];
    					if ($re == 1) 
    					{
    						$_SESSION['username']=$user;
    						setcookie("member","$user",time() + (864000*7),"/");
    						header('Location: homepage.php');
    						$mess="Đăng nhập thành công ! <br> Đã lưu cookie";
    					}
    					else 
    					{
    						$_SESSION['username']  = $user;
    						$mess="Đăng nhập thành công ! <br> Đã lưu Session";
    						header('Location: homepage.php');
    					}
    			}
    			else
    			{
    				$mess="Mật khẩu không đúng !";
    			}
    		}
    	}
    }
    else
    {
    	$mess=" ";
    }
?>
<?php
	if (isset($_SESSION['username'])) 
	{
		header('Location: homepage.php');
	}
	elseif (!isset($_SESSION['username'])) 
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
	<?php
		include_once('page/head.php');
	?>
<!--===============================================================================================-->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
						<strong>Đăng nhập để tiếp tục</strong>
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
												<input class="form-control" placeholder="Tên tài khoản..." name="username" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" placeholder="Mật khẩu..." name="password" type="password">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<input type="checkbox" name="remember" value="1">&nbsp; Lưu tài khoản
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Đăng Nhập" name="dangnhap">
										</div>
										<div class="form-group">
											<?php
												echo $mess;
												mysqli_close($conn);
											?>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Bạn chưa có tài khoản? <a href="register.php" onClick=""> Đăng kí tại đây ! </a>
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
<?php
	}
?>
