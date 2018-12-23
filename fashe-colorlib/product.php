<?php
	session_start();
	$selectproduct=$_GET['selectproduct'];
	$trang=$_GET['trang'];
	if(!isset($_GET['trang'])) 
	{
		$trang=1;
	}
    $host="localhost";
    $user="Phung";
    $pass="Phung1999";
    $dataname="onlineshop";
    $conn=mysqli_connect($host,$user,$pass,$dataname);
    mysqli_query($conn,"SET NAMES utf8");
    if(!$conn)
    	die();
    /*---------------------------------*/
    if (isset($_REQUEST['ok']))
    {
    	$timkiem = addslashes($_GET['searchproduct']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sản Phẩm</title>
	<meta charset="UTF-8">
	<?php
		include_once('page/head.php');
	?>
	<style>
.btn {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.btn {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}
</style>
</head>
<body class="animsition">
	<!-- Header -->
	<?php
		include_once('page/header.php');
	?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/slide3-1920x239.jpg);">
		<h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Danh Sách Sản Phẩm
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="product.php" class="s-text13 active1">
									Tất Cả
								</a>
							</li>

							<li class="p-t-4">
								<a href="product.php?selectproduct=quanaonu" class="s-text13">
									Quần Áo Nữ
								</a>
							</li>

							<li class="p-t-4">
								<a href="product.php?selectproduct=quanaonam" class="s-text13">
									Quần Áo Nam
								</a>
							</li>

							<li class="p-t-4">
								<a href="product.php?selectproduct=quanaotreem" class="s-text13">
									Quần Áo Trẻ Em
								</a>
							</li>

							<li class="p-t-4">
								<a href="product.php?selectproduct=tuixach" class="s-text13">
									Túi Xách
								</a>
							</li>
							<li class="p-t-4">
								<a href="product.php?selectproduct=kinhmat" class="s-text13">
									Kính Mắt
								</a>
							</li>
							<li class="p-t-4">
								<a href="product.php?selectproduct=dongho" class="s-text13">
									Đồng Hồ
								</a>
							</li>
							<li class="p-t-4">
								<a href="product.php?selectproduct=giay-mu" class="s-text13">
									Giày - Mũ
								</a>
							</li>
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Tìm Kiếm Sản phẩm
						</h4>
						<form action="product.php" method="GET">
						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="search" name="searchproduct" placeholder="Tìm Sản Phẩm...">

							<button type="submit" name="ok" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
						</form>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<form method="GET">
								<select class="selection-2" name="sortasc">
									<option value=" ORDER BY product.PriceProduct ASC ">Giá: Thấp Đến Cao</option>
									<option value=" ORDER BY product.PriceProduct DESC ">Giá: Cao Đến Thấp</option>
								</select>
							</div>
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sortprice">
									<option value=" PriceProduct < 200000 ">0 - 200000 đồng</option>
									<option value=" PriceProduct BETWEEN 200000 and 500000 ">200000 - 500000 đồng</option>
									<option value=" PriceProduct BETWEEN 500000 and 1000000 ">500000 - 1000000 đồng</option>
									<option value=" PriceProduct > 1000000  "> Trên 1000000 đồng</option>
								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							<button type="submit" class="btn btn">
								Lọc
							</button>
						</span>
					</div>
								</form>

					<!-- Product -->
					<div class="row">
						<?php

							if(isset($_GET['sortasc']) && isset($_GET['sortprice']))
							{
								$sortasc = $_GET['sortasc'];
								$sortprice = $_GET['sortprice'];
							}
							$sosp1trang =12;
							$vitripro=($trang -1)*$sosp1trang;

							if ($selectproduct =='quanaonu')
							{
								$query="SELECT * FROM product WHERE CategoryProduct= 4 and (Sex= 3 or Sex = 2)  LIMIT $vitripro,$sosp1trang ";
								$qr=mysqli_query($conn,"SELECT IdProduct FROM product WHERE CategoryProduct= 4 and (Sex= 3 or Sex = 2)");
							}
							elseif ($selectproduct =='quanaonam')
							{
								$query="SELECT * FROM product WHERE CategoryProduct= 4 and (Sex= 3 or Sex = 1)  LIMIT $vitripro,$sosp1trang ";
							$qr=mysqli_query($conn,"SELECT IdProduct FROM product WHERE CategoryProduct= 4 and (Sex= 3 or Sex = 1)");
							}
							elseif ($selectproduct =='quanaotreem') 
							{
								$query="SELECT * FROM product WHERE CategoryProduct= 4 and Sex= 4 LIMIT $vitripro,$sosp1trang ";
							$qr=mysqli_query($conn,"SELECT IdProduct FROM product WHERE CategoryProduct= 4 and Sex= 4");
							}
							elseif ($selectproduct =='giay-mu')
							{
								$query="SELECT * FROM product WHERE CategoryProduct= 6 or CategoryProduct= 7 LIMIT $vitripro,$sosp1trang ";
							$qr=mysqli_query($conn,"SELECT IdProduct FROM product WHERE CategoryProduct= 6 or CategoryProduct= 7");
							}
							elseif(isset($_GET['searchproduct']))
							{
								$query="SELECT * FROM product WHERE NameProduct LIKE N'%$timkiem%' LIMIT $vitripro,$sosp1trang ";
								$qr=mysqli_query($conn,"SELECT IdProduct FROM product WHERE NameProduct LIKE N'%$timkiem%'");
							}
							elseif(isset($_GET['sortasc']) && isset($_GET['sortprice']))
							{
								$query="SELECT * FROM product WHERE $sortprice $sortasc LIMIT $vitripro,$sosp1trang ";
								$qr=mysqli_query($conn,"SELECT * FROM product WHERE $sortprice $sortasc");
							}
							else 
							{
								$query="SELECT * FROM product  LIMIT $vitripro,$sosp1trang ";
							$qr=mysqli_query($conn,"SELECT IdProduct FROM product");
							}
							$result=mysqli_query($conn,$query);
							while ($obj=mysqli_fetch_object($result))
							{
						?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?php echo 	$obj->Images ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											<a href="addcart.php?id=<?php echo $obj->IdProduct ?>&sl=1">Add to Cart</a>
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?IdProduct=<?php echo $obj->IdProduct;  ?>&CategoryProduct=<?php echo $obj->CategoryProduct;  ?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $obj->NameProduct;   ?>
									</a>
									<?php
										if (($obj->Sale) != 0) 
										{
									?>
									<span class="block2-oldprice m-text7 p-r-5">
										<?php echo $obj->PriceProduct;   ?> đồng
									</span>
									&nbsp;&nbsp;&nbsp;
									<span class="block2-newprice m-text8 p-r-5">
										<?php echo $obj->Sale;   ?> đồng
									</span>
									<?php
										}
										elseif(($obj->Sale) == 0)
										{
									?>
									<span class="block2-price m-text6 p-r-5">
											<?php echo $obj->PriceProduct  ?> đồng
										</span>	
									<?php
										}
									?>
								</div>
							</div>
						</div>
						<?php
								}
						?>
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<!--<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>-->
						<?php
							$tongsp= mysqli_num_rows($qr);
							//echo $tongsp;
							if ($tongsp <= 0) 
							{
								echo "Hiện chưa có sản phẩm nào !";
							}
							$sotrang=ceil($tongsp/$sosp1trang);
							for ($trang=1; $trang <=$sotrang ; $trang++)
							{
							if (!isset($selectproduct)) 
							{
						?>
								<a href="product.php?trang=<?php echo $trang;  ?>" class="item-pagination flex-c-m trans-0-4"> <?php echo $trang ; ?></a>&nbsp;
						<?php
							}
							elseif(isset($selectproduct))
							{
						?>
								<a href="product.php?selectproduct=<?php echo $selectproduct; ?>&trang=<?php echo $trang;  ?>" class="item-pagination flex-c-m trans-0-4"> <?php echo $trang ; ?></a>&nbsp;
						<?php
							}
							elseif(isset($_GET['searchproduct']))
							{
						?>
								<a href="product.php?searchproduct=<?php echo $timkiem; ?>&ok=&trang=<?php echo $trang;  ?>" class="item-pagination flex-c-m trans-0-4"> <?php echo $trang ; ?></a>&nbsp;

						<?php
							}
							}
							mysqli_close($conn);
						?>

						<!--<a href="product.php?page=2/" class="item-pagination flex-c-m trans-0-4"><2/a>-->
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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function()
		{
		});

		$('.block2-btn-addwishlist').each(function()
		{
		
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
