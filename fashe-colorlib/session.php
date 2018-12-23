<?php
	session_start();
	if (isset($_GET['id_sp']))
	{
		$id_sp = $_GET['id_sp'];
	}
	function tinh_tong_tien()
	{
		$tongtien = 0;
		foreach ($_SESSION as $khoa => $gtri) 
		{
			$tongtien = $gtri['giatien']*$gtri['soluong'];
		}
		return $tongtien;
	}
	function ktra_id_sp($id_sp)
	{
		foreach ($_SESSION as $khoa => $gtri) 
		{
			if (strcmp($id_sp, $khoa) == 0) 
			{
				return 1;
			}
			return 0;
		}
	}
	if (isset($_GET['id_sp']) && (isset($_GET['tensp'])) && (isset($_GET['soluong'])) && (isset($_GET['giatien']))) 
	{
		$id_sp = $_GET['id_sp'];
		$ten_sp = $_GET['tensp'];
		$so_luong = $_GET['soluong'];
		$gia_tien = $_GET['giatien'];
		if (ktra_id_sp($id_sp)) 
		{
			$_SESSION['$id_sp']['soluong'] += $soluong;
		}
		else
		{
			$tt_sp = array(
							"tensanpham"=>$ten_sp,
							"soluong"=>$so_luong,
							"giatien"=>$gia_tien);
			$_SESSION[$id_sp] = $tt_sp;
		}
	}
	foreach ($_SESSION as $key => $gt) 
	{
		echo "ID Sản phẩm: ".$key."<br>";
		echo "Tên Sản Phẩm: ".$gt['tensanpham']."<br>";
		echo "Số Sản Phẩm: ".$gt['soluong']."<br>";
		echo "Giá Sản Phẩm: ".$gt['giatien']."<br>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<table border="1" align="center" color="grey">
			<tr align="center">
				<td width="200">
					Tên Sản Phẩm
				</td>
				<td width="200">	
					Giá
				</td>
				<td width="200">
					SL
				</td>
				<td width="200">
					Tổng
				</td>
			</tr>
			<?php
				foreach ($_SESSION as $key => $value) 
				{
			?>
			<tr align="center">
				<td width="200">
					<?php $value['tensanpham']; ?>
				</td>
				<td width="200">
					<?php $value['soluong']; ?>
				</td>
				<td width="200">
					<?php $value['giatien']; ?>
				</td>
				<td width="200">
					<?php echo $value['giatien']*$value['soluong']; ?>
				</td>
			</tr>
			<?php
				}
			?>
			<tr>
				<td colspan="3" align="right"> Tổng tiền</td>
				<td><?php echo tinh_tong_tien();  ?> </td>
			</tr>
		</table>
</body>
</html>