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
	if (isset($_GET['ID'])) 
	{
		$ID = $_GET['ID'];
	}
	elseif (!isset($_GET['ID'])) 
	{
		header('Location: blog.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chi Tiết Bài Viết</title>
	<meta charset="UTF-8">
	<?php
		include_once('page/head.php');
	?>
</head>
<body class="animsition">
	<?php 
		include_once('page/header.php');
	?>
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="homepage.php" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="blog.php" class="s-text16">
			Blog
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
		<?php
			$query="SELECT * FROM blog WHERE ID=".$ID;
			$result=mysqli_query($conn,$query);
			while ($obj=mysqli_fetch_object($result)) 
			{
		?>
		<span class="s-text17">
			<?php echo $obj->Title;  ?>
		</span>
	</div>

	<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="<?php echo $obj->Avatar;  ?>" alt="IMG-BLOG">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									<?php echo $obj->Title;  ?>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										<?php echo $obj->Author;  ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $obj->CreatedDate;  ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $obj->Category;  ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										8 Comments
									</span>
								</div>

								<p class="p-b-25">
									<?php echo $obj->Content;  ?>
								</p>

								<p class="p-b-25">
									<?php echo $obj->Content;  ?>
								</p>
							</div>

							<div class="flex-m flex-w p-t-20">
								<span class="s-text20 p-r-20">
									Tags
								</span>

								<div class="wrap-tags flex-w">
									<a href="#" class="tag-item">
										<?php echo $obj->Tag;  ?>
									</a>

									<a href="#" class="tag-item">
										<?php echo $obj->Tag;  ?>
									</a>
								</div>
							</div>
						</div>
						<?php
							}
						?>
						<!-- Leave a comment -->
						<form class="leave-comment">
							<h4 class="m-text25 p-b-14">
								Để Lại Bình Luận
							</h4>

							<p class="s-text8 p-b-40">
								Địa chỉ của bạn sẽ không được công bố . Dấu * chỉ thị phần bắt buộc !
							</p>

							<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="comment" placeholder="Bình luận..."></textarea>

							<div class="bo12 of-hidden size19 m-b-20">
								<input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" placeholder="Tên... *">
							</div>

							<div class="bo12 of-hidden size19 m-b-20">
								<input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="email" placeholder="Email... *">
							</div>

							<div class="bo12 of-hidden size19 m-b-30">
								<input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="website" placeholder="Địa Chỉ...">
							</div>

							<div class="w-size24">
								<!-- Button -->
								<button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Đăng Bình Luận
								</button>
							</div>
						</form>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

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
								mysqli_close($conn);
							?>
						</ul>

						<!-- Archive -->
						<h4 class="m-text23 p-t-50 p-b-16">
							Archive
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
							Tags
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


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Liên Lạc Với Chúng Tôi
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Bạn có câu hỏi gì không? Hãy cho chúng tôi biết tại KTXA- CĐ CNTT , Hòa Quý, Đà Nẵng hoặc gọi cho chúng tôi theo số (0)0702581581
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/profile.php?id=100015212977439" target="_blank">Phụng Nguyễn</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

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
