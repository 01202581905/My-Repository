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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thông Tin</title>
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
			About
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="images/doc.jpg" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Thông Tin Cá Nhân
					</h3>

					<p class="p-b-28">
						Tên đầy đủ :  Nguyễn Trọng Phụng<br>
						Năm sinh :  04 - 02 -1999<br>
						Quê quán : Lang Châu Bắc , Duy Phước , Duy Xuyên , Quảng Nam <br>
						Công việc :  đang là học sinh tại<a href="http://cit.udn.vn/"> Cao Đẳng Công Nghệ Thông Tin - Đại học Đà Nẵng</a><br>
						Ngôn ngữ lập trình yêu thích : PHP , Nodejs .
					</p>

					<div class="bo13 p-l-29 m-l-9 p-b-10">
						<p class="p-b-11">
							Châm ngôn sống : mình không có châm ngôn sống cho bản thân =)) <br>
							Sở thích : thích đi la cà cùng bạn bè , chơi game cùng bạn bè , thích đọc sách nhưng khá lười <br> Rất thích xem phim liên quan đến siêu anh hùng đặc biệt là các nhân vật ở trong 2 vũ trụ DC & Marvel. Ngoài ra mình còn rất thích ngáo , cor , đần và hoàng thượng nữa ~~
						</p>
						<br>
						<span class="s-text7">
							<a href="https://www.facebook.com/profile.php?id=100015212977439">-&nbsp; &nbsp; Phụng Nguyễn&nbsp;&nbsp;  -</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<?php
		mysqli_close($conn);
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
	<script src="js/main.js"></script>

</body>
</html>
