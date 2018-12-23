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
	<title>Bài Viết</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			Blog
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						<!-- item blog -->
						<?php
							$qr="SELECT * FROM blog ";
							$sl=mysqli_query($conn,$qr);
							while ($object=mysqli_fetch_object($sl)) 
							{
						?>
						<div class="item-blog p-b-80">
							<a href="blog-detail.php" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="<?php echo $object->Avatar; ?>" alt="IMG-BLOG">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									<?php echo $object->CreatedDate; ?>
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="blog-detail.php?ID=<?php echo $object->ID; ?>" class="m-text24">
										<?php echo $object->Title; ?>
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										<?php
											$Author= $object->Author;
											echo $Author;
										 ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $object->Category; ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										8 Comments
									</span>
								</div>

								<p class="p-b-12">
									<?php echo $object->Content; ?>
								</p>

								<a href="blog-detail.php?ID=<?php echo $object->ID; ?>" class="s-text20">
									Chi Tiết Bài Viết
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
								
							</div>
						</div>
						<!-- end item blog -->
						<?php
							}
						?>
					</div>
					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-r-50">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
 	
				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Tìm Kiếm">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Danh Mục
						</h4>

						<ul>
							<li class="p-t-6 p-b-8 bo6">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									Thời Trang
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									Làm Đẹp
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									Phong Cách Đường Phố
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									Lối Sống
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									Đồ Thủ Công
								</a>
							</li>
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Sản Phẩm Nổi Bật
						</h4>

						<ul class="bgwhite">
							<?php
								$query="SELECT IdProduct,NameProduct,Images,PriceProduct,CategoryProduct FROM product ORDER BY RAND() LIMIT 0,5";
								$result=mysqli_query($conn,$query);
								while ($obj=mysqli_fetch_object($result)) 
								{
							?>
							<li class="flex-w p-b-20">
								<a href="product-detail.php?IdProduct=<?php echo $obj->IdProduct;  ?>&CategoryProduct=<?php echo $obj->CategoryProduct;  ?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="<?php echo $obj->Images;  ?>" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.php?IdProduct=<?php echo $obj->IdProduct;  ?>&CategoryProduct=<?php echo $obj->CategoryProduct;  ?>" class="s-text20">
										<?php echo $obj->NameProduct;  ?>
									</a>

									<span class="dis-block s-text17 p-t-6">
										<?php echo $obj->PriceProduct;  ?>
									</span>
								</div>
							</li>
							<?php
								}
							?>
						</ul>

						<!-- Archive -->
						<h4 class="m-text23 p-t-50 p-b-16">
							Thời Gian
						</h4>

						<ul>
							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									July 2018
								</a>

								<span class="s-text13">
									(9)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									June 2018
								</a>

								<span class="s-text13">
									(39)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									May 2018
								</a>

								<span class="s-text13">
									(29)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									April  2018
								</a>

								<span class="s-text13">
									(35)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									March 2018
								</a>

								<span class="s-text13">
									(22)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									February 2018
								</a>

								<span class="s-text13">
									(32)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									January 2018
								</a>

								<span class="s-text13">
									(21)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									December 2017
								</a>

								<span class="s-text13">
									(26)
								</span>
							</li>
						</ul>

						<!-- Tags -->
						<h4 class="m-text23 p-t-50 p-b-25">
							Gắn Thẻ
						</h4>

						<div class="wrap-tags flex-w">
							<a href="#" class="tag-item">
								Fashion
							</a>

							<a href="#" class="tag-item">
								Lifestyle
							</a>

							<a href="#" class="tag-item">
								Denim
							</a>

							<a href="#" class="tag-item">
								Streetstyle
							</a>

							<a href="#" class="tag-item">
								Crafts
							</a>
						</div>
					</div>
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
	<script src="js/main.js"></script>

</body>
</html>
