<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="session.php" method="GET">
			<label>ID</label><input type="text" name="id_sp"><br>
			<label>Tên</label><input type="text" name="tensp"><br>
			<label>Số Lương</label><input type="number" name="soluong"><br>
			<label>Giá</label><input type="text" name="giatien"><br>
			<input type="submit" name="" value="GO">
		</form>
</body>
</html>