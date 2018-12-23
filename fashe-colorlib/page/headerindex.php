
<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="homepage.php" class="logo">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="homepage.php">Trang Chủ</a>
					</li>
					<li>
						<a href="product.php">Sản Phẩm</a>
					</li>

					<li class="sale-noti">
						<a href="product.html">Giảm Giá</a>
					</li>

					<li>
						<a href="blog.php">Bài Viết</a>
					</li>

					<li>
						<a href="about.php">Thông Tin</a>
					</li>

					<li>
						<a href="contact.php">Liên Hệ</a>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti">
							<?php
								if(isset($_SESSION['cart']))
								{
								$cart = $_SESSION['cart'];
								$sosanpham= COUNT($cart); echo $sosanpham;
								}
								else
								{
									echo "0";
								}
							?>
				</span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
								<?php
									if (COUNT($cart) > 0) 
									{
										foreach ($cart as $id => $soluong)
										{
											$result=mysqli_query($conn,"SELECT * FROM product WHERE IdProduct = $id");
											while ($obj=mysqli_fetch_object($result))
											{
								?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo  $obj->Images; ?>" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											<?php echo $obj->NameProduct; ?>
										</a>

										<span class="header-cart-item-info">
											<?php echo $soluong; ?> X <?php  echo $obj->PriceProduct; ?>
										</span>
									</div>
								</li>
								<?php
												static $TOTAL;
												$TOTAL += $obj->PriceProduct*$soluong;
											}
										}
									}
								?>
							</ul>
					<div class="header-cart-total">
								Tổng Tiền:  <?php echo $TOTAL; ?> đồng
							</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Xem Giỏ Hàng
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Thanh Toán
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- top noti -->
	<div class="flex-c-m size22 bg0 s-text21 pos-relative">
		20% off everything!
		<a href="product.php" class="s-text22 hov6 p-l-5">
			Shop Now
		</a>

		<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
			<i class="fa fa-remove fs-13" aria-hidden="true"></i>
		</button>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<!-- Logo2 -->
				<a href="homepage.php" class="logo2">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<div class="topbar-child2">
					<span class="topbar-email">
						<?php
							if (!isset($_SESSION['username'])) 
							{
						?>
							<a>&nbsp;&nbsp;&nbsp;</a>
						<?php
							}
							elseif (isset($_SESSION['username'])) 
							{
								$user=$_SESSION['username'];
								echo '<a href="member.php">'.$user.'</a>';
							}
						?>
					</span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<?php
							if (!isset($_SESSION['username'])) 
							{
						?>
							<a href="login.php" class="header-wrapicon1 dis-block">
							<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON" title="Đăng Nhập">
							</a>
						<?php
							}
							elseif(isset($_SESSION['username']))
							{
						?>
							<a href="logout.php" class="header-wrapicon1 dis-block">
							<img src="images/icons/logout.png" class="header-icon1" alt="ICON" title="Đăng Xuất">
							</a>
						<?php		
							}
						?>
						
					</a>
					<!--  -->
					<span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">
							<?php
								if(isset($_SESSION['cart']))
								{
								$cart = $_SESSION['cart'];
								$sosanpham= COUNT($cart); echo $sosanpham;
								}
								else
								{
									echo "0";
								}
							?>
						</span>
						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php
								if(isset($cart))
								{
									if(COUNT($cart) > 0) 
									{
										foreach ($cart as $id => $soluong)
										{
											$result=mysqli_query($conn,"SELECT * FROM product WHERE IdProduct = $id");
											while ($obj=mysqli_fetch_object($result))
											{
								?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo  $obj->Images; ?>" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											<?php echo $obj->NameProduct; ?>
										</a>

										<span class="header-cart-item-info">
											<?php echo $soluong; ?> X <?php  echo $obj->PriceProduct; ?>
										</span>
									</div>
								</li>
								<?php
											static $TOTAL;
											$TOTAL += $obj->PriceProduct*$soluong;
											}
										}
									}
								}
								else
								{
									echo "Bạn chưa lựa chọn sản phẩm nào ! ";
								}
								?>
							</ul>

							<div class="header-cart-total">
								Tổng Tiền:  <?php echo $TOTAL; ?> đồng
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Xem giỏ hàng
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Thanh Toán
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="homepage.php">Trang Chủ</a>
							</li>

							<li>
								<a href="product.php">Sản Phẩm</a>
							</li>

							<li class="sale-noti">
								<a href="product.php">Giảm Giá</a>
							</li>

							<li>
								<a href="blog.php">Bài Viết</a>
							</li>

							<li>
								<a href="about.php">Thông Tin</a>
							</li>

							<li>	
								<a href="contact.php">Liên Hê</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>