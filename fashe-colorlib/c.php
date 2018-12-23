<?php
	session_start();
	$host="localhost";
    $user="Phung";
    $pass="Phung1999";
    $dataname="onlineshop";
    $conn=mysqli_connect($host,$user,$pass,$dataname);
    mysqli_query($conn,"SET NAMES utf8");
    if(!$conn)
    	echo "Kết nối CSDL thất bại".mysqli_connect_error($conn);
?>
<?php
	if (isset($_POST['ok'])) 
	{
		$ten = $_POST['ten'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$diachi = $_POST['diachi'];
		if (!empty($ten) && !empty($phone) && !empty($email) && !empty($diachi)) 
		{
			$query = "INSERT INTO orderproduct(UserName,Phone,Email,Total,Address)
					  VALUES('$ten',$phone,'$email',$total,'$diachi')";
			$result = mysqli_query($conn,$query);
		}
		else
		{
			echo "Vui lòng điền đầy đủ thông tin";
		}
	}		
	$total = 555;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="">
		Tên<input type="text" name="ten"><br>
		Phone<input type="text" name="phone"><br>
		EMail<input type="email" name="email"><br>
		Địa Chỉ<input type="text" name="diachi"><br>
		<input type="submit" name="ok" value="OK">
	</form>
</body>
</html>