<?php
	session_start();
?>
<form action="giohang.php" method="GET">
	<h3>Mua Sách</h3>
	<label>ID Sách</label><input type="text" name="id_sach"><br>
	<label>Tên Sách</label><input type="text" name="ten_sach"><br>
	<label>Tên Tác Giả</label><input type="text" name="ten_tac_gia"><br>
	<label>Tên Thể Loại</label><input type="text" name="ten_the_loai"><br>
	<label>Số Lượng</label><input type="text" name="so_luong"><br>
	<label>Đơn Giá</label><input type="text" name="don_gia"><br>
	<input type="submit" name="" value="Mua Sách">
</form>