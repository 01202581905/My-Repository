
<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="https://www.facebook.com/profile.php?id=100015212977439" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.facebook.com/profile.php?id=100015212977439" class="topbar-social-item fa fa-instagram"></a>
					<a href="https://www.facebook.com/profile.php?id=100015212977439" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="https://www.facebook.com/profile.php?id=100015212977439" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="https://www.facebook.com/profile.php?id=100015212977439" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>
			</div>

			<div class="wrap_header">
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
								<a href="product.php">Giảm Giá</a>
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
				<div class="header-icons">
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
						
					
					</span>
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
								if (isset($cart)) 
								{
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
										<?php
											if (($obj->Sale) == 0)
											{
										?>
										<span class="header-cart-item-info">
											<?php echo $soluong; ?> X <?php  echo $obj->PriceProduct; ?>
										</span>
									</div>
								</li>
								<?php
											static $TOTAL;
											$TOTAL += $obj->PriceProduct*$soluong;
											}
											elseif (($obj->Sale) != 0) 
											{
										?>
										<span class="header-cart-item-info">
											<?php echo $soluong; ?> X <?php  echo $obj->Sale; ?>
										</span>
									</div>
								</li>
								<?php
											static $TOTAL;
											$TOTAL += $obj->Sale*$soluong;
											}
											}
										}
									}
									else
									{
										echo " Bạn chưa lựa chọn sản phẩm nào !";
									}
								}
								?>
							</ul>
							<div class="header-cart-total">
								 Tổng Tiền: <?php
								 				if (isset($cart)) 
								 				{
									 				if(COUNT($cart) > 0)
									 				{
									 					if ($TOTAL >= 300000) 
														{ 
															$phi = 0;  
														} 
														elseif ($TOTAL >= 200000) 
														{ 
															$phi = 20000;  
														}
														else
														{
															$phi = 40000; 
														}
														$tien = $TOTAL+$phi;
														echo $tien;
									 				}
									 				else
									 				{
									 					echo "0";
									 				}
									 			}
									 			else
									 			{
									 				echo "0";
									 			}
								 			?> đồng
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
		</div>
	</header>