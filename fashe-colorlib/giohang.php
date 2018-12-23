<?php
	session_start();
	session_destroy();
	function ktra_id_hoa($id_sach)
	{
		foreach ($_SESSION as $key => $value)
		{
			if(strcmp($id_sach, $key) == 0)
				return 1;
		}
		return 0;
	}
	function tinh_tong_tien()
	{
		$tong_tien = 0;
		foreach ($_SESSION as $key => $value)
		{
			$tong_tien = $tong_tien + $value['don_gia']*$value['so_luong'];
		}
		return $tong_tien;
	}
	if(isset($_GET['id_sach']) && (isset($_GET['ten_sach'])) && (isset($_GET['ten_tac_gia'])) && (isset($_GET['ten_the_loai'])) && (isset($_GET['so_luong'])) && (isset($_GET['don_gia'])) )
	{
		$id_sach = $_GET['id_sach'];
		$ten_sach = $_GET['ten_sach'];
		$ten_tac_gia = $_GET['ten_tac_gia'];
		$ten_the_loai = $_GET['ten_the_loai'];
		$so_luong = $_GET['so_luong'];
		$don_gia = $_GET['don_gia'];
		if(ktra_id_hoa($id_sach))
		{
			$_SESSION[$id_sach]['so_luong'] += $so_luong;
		}
		else
		{
			$tt_sach = array('ten_sach'=>$ten_sach,
							'ten_tac_gia'=>$ten_tac_gia,
							'ten_the_loai'=>$ten_the_loai,
							'so_luong'=>$so_luong,
							'don_gia'=>$don_gia);
			$_SESSION[$id_sach] = $tt_sach;
		}
	}
	foreach ($_SESSION as $key => $value)
	{
		echo "ID Sách : ".$key."<br>";
		echo "Tên Sách : ".$value['ten_sach']."<br>";
		echo "Tên Tác Giả : ".$value['ten_tac_gia']."<br>";
		echo "Tên Thể Loại : ".$value['ten_the_loai']."<br>";
		echo "Số Lượng : ".$value['so_luong']."<br>";
		echo "Đơn Giá : ".$value['don_gia']."<br>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mua Hoa</title>
</head>
<body>
	<table align="center" border="1">
		<tr>
			<td>Tên Sách</td>
			<td>Tên Tác Giả</td>
			<td>Tên Thể Loại </td>
			<td>Đơn Giá</td>
			<td>Số Lượng</td>
			<td>Tổng Tiền</td>
		</tr>
		<?php
			foreach ($_SESSION as $key => $value)
			{
		?>
				<tr>
					<td><?=$value['ten_sach']?></td>
					<td><?=$value['ten_tac_gia']?></td>
					<td><?=$value['ten_the_loai']?></td>
					<td><?=$value['don_gia']?></td>
					<td><?=$value['so_luong']?></td>
					<td><?=$value['don_gia']*$value['so_luong']?></td>
				</tr>
		<?php
			}
		?>
		<tr>
			<td colspan="5">
				Tổng Tiền :
			</td>
			<td>
				<?=tinh_tong_tien()?>
			</td>
		</tr>	
	</table>
</body>
</html>