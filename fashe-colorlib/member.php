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
    /*------------------------------------------*/
    if (isset($_POST['luutt'])) 
    {

    	$fullname = $_POST['fullname'];
    	$cmnd = $_POST['cmnd'];
    	$phone = $_POST['phone'];
    	$diachi = $_POST['diachi'];
    	//////////////////////////
    	$fullname = trim($fullname);
    	$cmnd = trim($cmnd);
    	$phone = trim($phone);
    	$diachi = trim($diachi);
    	if ($fullname == "" || $cmnd == "" || $phone == "" || $diachi == "") 
    	{
    		$mess = "Vui lòng điền đầy đủ thông tin trước khi chỉnh sửa";
    	}
    	else
    	{	$info = $_SESSION['username'];
    		$queryupdate="UPDATE member 
    					SET FullName = N'$fullname' , CMND = $cmnd , Phone = $phone , DiaChi = N'$diachi' 
    					WHERE UserName = N'$info'";
    		$resultupdate = mysqli_query($conn,$queryupdate);
    		$mess = "Cập nhật thông tin thành công";
    	}
    }
?>
<?php
	if (isset($_SESSION['username'])) 
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thông Tin Cá Nhân</title>
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
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<!--  -->
						<h4 class="m-text14 p-b-32">
							<a href="member.php?info">Thông Tin Cá Nhân</a> 
						</h4>
						<!--  -->
						<h4 class="m-text14 p-b-32">
							<a href="member.php?listwish">Danh Sách Yêu Thích</a> 
						</h4>
						<!--  -->
						<h4 class="m-text14 p-b-32">
							<a href="member.php">Lịch Sử Mua Hàng</a> 	
						</h4>
						<!--  -->
					</div>
				</div>
	<?php
		if (isset($_GET['listwish']))
		{
			echo "Đây là trang danh sách sản phẩm yêu thích";
		}
		elseif (isset($_GET['info'])) 
		{
			$info = $_SESSION['username'];
			$query = "SELECT * FROM member WHERE UserName = N'$info'";
			$result = mysqli_query($conn,$query);
			while ($obj=mysqli_fetch_object($result)) 
			{
		?>
			<form method="POST">
						Tên Đầy Đủ :
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="fullname" value="<?php echo $obj->FullName; ?>">
						</div>
						<br>
						Chứ Minh Thư :
						<div class="size13 bo4 m-b-22">
							<input type="number" name="cmnd" value="<?php echo $obj->CMND; ?>" min="0" maxlength="15">
						</div>
						<br>
						Số Điện Thoại : 
						<div class="size13 bo4 m-b-22">
							<input type="number" name="phone" value="<?php echo $obj->Phone; ?>">
						</div>
						<br>
						Địa Chỉ :
						<div class="size13 bo4 m-b-22">
							<input type="text" name="diachi" value="<?php echo $obj->DiaChi; ?>">
						</div>
						<br>
						<div class="size10 trans-0-4 m-t-10 m-b-10">
							<?php
							if (isset($mess)) 
							{
								echo $mess;
							}
							else
							{
								echo "";
							}
							?>
						</div>
						<br>
						<div class="size10 trans-0-4 m-t-10 m-b-10">
							<button type="submit" name="luutt" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Lưu Thông Tin
							</button>
						</div>
			</form>
		<?php
			}
		}
		else
		{
			$info = $_SESSION['username'];
			$queryhistory ="SELECT Images,NameProduct,PriceProduct,SoLuong
							FROM infororderproduct, orderproduct, member,product 
							WHERE infororderproduct.IDorder = orderproduct.ID 
							and orderproduct.UserName = member.UserName
							and product.IdProduct = infororderproduct.IdProduct
						    and member.UserName = N'$info'";
		?>
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
				<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Tên Sản Phẩm</th>
							<th class="column-3">Giá Tiền</th>
							<th class="column-4 p-l-70">Số Lượng</th>
							<th class="column-5">Tổng Tiền</th>
						</tr>
		<?php

			$resulthistory=mysqli_query($conn,$queryhistory);
			while ($his=mysqli_fetch_object($resulthistory)) 
			{
		?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo $his->Images; ?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?php echo $his->NameProduct; ?></td>
							<td class="column-3"><?php echo $his->PriceProduct; ?></td>
							<td class="column-4">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $his->SoLuong; ?>
							</td>
							<td class="column-5"><?php echo $his->SoLuong*$his->PriceProduct; ?></td>
						</tr>
		<?php
			}
		}
		?>
					</table>
				</div>
			</div>
	
					<!-- Product -->
					<!-- Pagination -->
				</div>
			</div>
		</div>
	</section>
	<?php
		include_once('page/footer.php');
	?>
	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Đã thêm vào giỏ hàng !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php
	}
	elseif (!isset($_SESSION['username'])) 
	{
		header('Location: login.php');
	}
?>