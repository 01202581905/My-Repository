<?php
	session_start();
	$IdProduct=$_GET['IdProduct'];
	$category=$_GET['CategoryProduct'];
	if (!isset($_GET['IdProduct'])) 
	{
		$IdProduct=12;
	}

	if (!isset($_GET['CategoryProduct'])) 
	{
		$category=4;
	}

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
	<title>Chi Tiết Sản Phẩm</title>
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
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="homepage.php" class="s-text16">
			Trang Chủ
			<?php
				$query="SELECT * FROM product WHERE IdProduct = $IdProduct";
				$result=mysqli_query($conn,$query);
				while ($obj=mysqli_fetch_object($result)) 
				{
			?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			<?php 
				$queri="SELECT * FROM productcategory WHERE IdCategory=$category" ;
				$kn=mysqli_query($conn,$queri);
				while($kq=mysqli_fetch_object($kn)) 
				{
				  	echo $kq->NameCategory;
				}
			?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $obj->NameProduct ; ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?php echo $obj->Images ; ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo $obj->Images ; ?>" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="images/thumb-item-02.jpg">
							<div class="wrap-pic-w">
								<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="images/thumb-item-03.jpg">
							<div class="wrap-pic-w">
								<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $obj->NameProduct ; ?>
				</h4>
				<?php
					if (($obj->Sale) != 0)
					{
				?>
				<span class="block2-oldprice m-text7 p-r-5">
					<?php echo $obj->PriceProduct ; ?> &nbsp;&nbsp;đồng
				</span>
				<br>
				<span class="block2-price m-text8 p-r-5">
					<?php echo $obj->Sale ; ?> &nbsp;&nbsp;đồng
				</span>
				<?php
					}
					elseif (($obj->Sale) == 0) 
					{
				?>
					<span class="block2-price m-text8 p-r-5">
					<?php echo $obj->PriceProduct ; ?> &nbsp;&nbsp;đồng
				</span>
				<?php
					}
				?>
				<p class="s-text8 p-t-10">
					Giới Thiệu Sơ Lượt Về Sản Phẩm
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Kích Cỡ
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Chọn Kích Cỡ</option>
								<option>Size S</option>
								<option>Size M</option>
								<option>Size L</option>
								<option>Size XL</option>
							</select>
						</div>
					</div>

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Màu
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Chọn Màu</option>
								<option>Màu Xám</option>
								<option>Màu Đỏ</option>
								<option>Màu Đen</option>
								<option>Mày Xanh</option>
							</select>
						</div>
					</div>
					<form action="addcart.php?id=<?php echo $obj->IdProduct ; ?>&" method="GET">
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<input  type="number" name="sl" formmethod="GET" maxlength=1 value="1" min=1 max=5 size=1>
							</div>
							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<input type="submit" value="Add to Cart" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							</div>
						</div>
					</div>
					
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Mã Sản Phẩm:</span><input type="text" name="id" size="2" value="<?php echo $obj->IdProduct ; ?>" readonly=""> 
					<span class="s-text8">Danh Mục Sản Phẩm : <?php echo $obj->CategoryProduct ; ?></span>
				</div>
				</form>
				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Miêu Tả Sản Phẩm
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Miêu tả sản phẩm nè
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Thông Tin Thêm
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							thông tin thêm nè
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Đánh Giá (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							đánh giá nè	
						</p>
					</div>
					<?php
							}
					?>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<center>
					<div class="fb-share-button" data-href="http://localhost/fashe-colorlib/product-detail.php?IdProduct=<?php echo $obj->IdProduct ; ?>&amp;CategoryProduct=7" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Ffashe-colorlib%2Fproduct-detail.php%3FIdProduct%3D48%26CategoryProduct%3D7&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
				</center>
			</div>
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản Phẩm Tương Tự
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php
						$qr="SELECT IdProduct,NameProduct,Images,PriceProduct FROM product WHERE CategoryProduct= $category";
						$ketnoi=mysqli_query($conn,$qr);
						while($obj2=mysqli_fetch_object($ketnoi)) 
						{
					?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo $obj2->Images; ?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>
									<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												<a href="addcart.php?id=<?php echo $obj2->IdProduct ?>&sl=1">Add to Cart</a>
												</button>
											</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.php?IdProduct=<?php echo $obj2->IdProduct; ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $obj2->NameProduct; ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									<?php echo $obj2->PriceProduct; ?>&nbsp;đồng
								</span>
							</div>
						</div>
					</div>
					<?php
						}
						mysqli_close($conn);
					?>
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
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
		});
		$('.block2-btn-addwishlist').each(function(){
		});

		$('.btn-addcart-product-detail').each(function(){
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
<div id="fb-root"></div>
<script>(function(d, s, id)
	{
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
	  fjs.parentNode.insertBefore(js, fjs);
	}
	(document, 'script', 'facebook-jssdk'));
</script>
</html>
