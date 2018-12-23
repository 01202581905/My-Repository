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
    //----------------------------------------------------------
    if (isset($_GET['id']) && isset($_GET['sl']))
    {
	    $id = $_GET['id'];
		$sl = $_GET['sl'];
		if ($sl > 5) 
		{
		    $sl = 5;
		}
		if (($id !="") && ($sl != "")) //nếu có id truyền vào
		{
		    if (isset($_SESSION['cart'][$id]))
		    {
			    //thay đổi số lượng
			    $_SESSION['cart'][$id] = $sl;
			    header('Location: cart.php');
			}
		    else //nếu chưa có trong session
		    {
		        header('Location: cart.php');
			}
    	}
    }
    //-------------------------------------------------
  	$cart = $_SESSION['cart'];
  	if (COUNT($cart) > 0) 
  	{
	  	if (isset($_POST['thanhtoan'])) 
	  	{
	  		$name = $_POST['name'];
	  		$phone = $_POST['phone'];
	  		$email = $_POST['email'];
	  		$diachi=$_POST['diachi'];
	  		$tien = $_POST['tongtien'];
	  		$_SESSION['tien'] = $tien;
	  		//////////////////////
	  		$name = trim($name);
	  		$phone = trim($phone);
	  		$email = trim($email);
	  		$diachi = trim($diachi);
	  		
	  		if ($name == "" || $phone == "" || $email == "" || $diachi == "") 
	  		{
	  			$mess="Vui lòng nhập đủ thông tin để xác nhận đơn hàng !";
	  		}
	  		else
	  		{
	  			$query="INSERT INTO orderproduct(UserName,Phone,Email,Total,Address) 
	  			VALUES('$name','$phone','$email',$tien,'$diachi')";
	  			$result=mysqli_query($conn,$query);
	  			$cout=mysqli_num_rows($result);
	  			if ($cout = 1) 
	  			{
	  				$query1 = "SELECT MAX(ID) as MaxID FROM orderproduct";
	  				$result1 = mysqli_query($conn,$query1);
	  				$object = mysqli_fetch_object($result1);
	  					$idorder = $object->MaxID;
	  					foreach ($cart as $id => $soluong)
	  					{
	  						$query2 = "INSERT INTO infororderproduct(IDorder,IdProduct,SoLuong)
	  									VALUES($idorder,$id,$soluong);";
	  						$result2 = mysqli_query($conn,$query2);
	  					}
	  				unset($_SESSION['cart']);
	  					header('Location: homepage.php');
	  			}
	  			else
	  			{
	  				$mess="Hệ thống hiện đang gặp quá tải. Xin quý khách quay lại mua hàng sau . Cảm ơn quý khách !";
	  			}
	  		}
	  	}
	}
	else
	{
		$mess="Vui lòng lựa chọn sản phẩm trước khi thanh toán";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--==================================================-->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--==================================================-->
	<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
</style>
	<!--==================================================-->
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
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/cart.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
		<!--===============================================-->
		<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">Ảnh Sản Phẩm</th>
							<th class="column-2">Tên Sản Phẩm</th>
							<th class="column-3">Số Lượng</th>
							<th class="column-4">Giá Tiền</th>
							<th class="column-5">Tổng Tiền</th>
						</tr>
	<?php
	if (COUNT($cart) > 0) 
	{
		foreach ($cart as $id => $soluong)
		{
			$result=mysqli_query($conn,"SELECT * FROM product WHERE IdProduct = $id");
			while ($obj=mysqli_fetch_object($result))
			{
		?>
							<tr class="table-row">
								<td class="column-1">
									<a href="deletecart.php?id=<?php echo $id; ?>">
										<div class="cart-img-product b-rad-4 o-f-hidden">
											<img src="<?php echo  $obj->Images; ?>" alt="IMG-PRODUCT">
										</div>
									</a>
								</td>
								<td class="column-2">
									<a href="product-detail.php?IdProduct=<?php echo $id; ?>">
									<?php echo $obj->NameProduct; ?>
									</a>
								</td>
								<td class="column-4">
									<input type="number" min="1" id="quantity<?php echo $id; ?>" max="5" name="quantity<?php echo $id; ?>" value="<?php echo $soluong; ?>" size="5">
									<br>
									<a href="javascript:void(0)" onclick="return updateItem(<?php echo $id; ?>)">
									Cập Nhật
									</a>
								</td>
								<?php
									if (($obj->Sale) == 0)
									{
								?>
								<td class="column-3"><?php  echo $obj->PriceProduct; ?>
								</td>
								<td class="column-5">
									<?php echo $obj->PriceProduct*$soluong; ?>đồng
								</td>
							</tr>
		<?php
			static $TOTAL;
			$TOTAL += $obj->PriceProduct*$soluong;
			}
			elseif (($obj->Sale) != 0)
			{
		?>
								<td class="column-3"><?php  echo $obj->Sale; ?>
								</td>
								<td class="column-5">
									<?php echo $obj->Sale*$soluong; ?>đồng
								</td>
							</tr>
	<?php
			static $TOTAL;
			$TOTAL += $obj->Sale*$soluong;
			}
			}
		}
	}
	?>
					</table>
				</div>
			</div>
			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
					<a href='product.php' class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Tiếp tục mua hàng
					</a>	
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					
					<button type="submit" name="capnhat" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Cập Nhật Giỏ Hàng
					</button>
					
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Tổng Giỏ Hàng
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Tổng Tiền :
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php
							if (COUNT($cart) > 0)
							{
								echo $TOTAL.' đồng';  
							}
							else
							{
								echo  " 0 đồng ";
							}
						?>	
					</span>
				</div>
				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Phí Ship :
					</span>
					<span class="m-text21 w-size20 w-full-sm">
						<?php
						if (COUNT($cart) > 0) 
						{
							if ($TOTAL >= 300000) 
							{ 
								$phi = 0; 
								echo 'Miễn phí giao hàng'; 
							} 
							elseif ($TOTAL >= 200000) 
							{ 
								$phi = 20000; 
								echo "$phi đồng"; 
							}
							else
							{
								$phi = 40000; 
								echo "$phi đồng"; 
							}
						}
						else
						{
							echo "";
						}
						?>	
					</span>
				</div>
				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Giao Hàng :
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							Giao hàng theo đường bưu điện.
						</p>

						<span class="s-text19">
							Địa Chỉ Giao Hàng
						</span>
						<form method="POST" action="">
						<?php
							if (isset($_SESSION['username'])) 
							{
								$info = $_SESSION['username'];
								$query3 = "SELECT * FROM member WHERE UserName = N'$info'";
								$result3 = mysqli_query($conn,$query3);
								while($o=mysqli_fetch_object($result3)) 
								{
						?>			
							<!--============================================-->
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" readonly type="text" name="name" value="<?php echo $o->UserName; ?>">
						</div>
						<!--============================================-->
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" readonly type="tel" name="phone" value="<?php echo $o->Phone; ?>">
						</div>
						<!--============================================-->
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" readonly type="text" name="email" value="<?php echo $o->Email; ?>">
						</div>
						<!--============================================-->
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="diachi" placeholder="Địa chỉ...">
						</div>
						<?php
								}
							}
							else
							{
						?>
							<!--============================================-->
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="name" placeholder="Tên người mua...">
						</div>
						<!--============================================-->
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="tel" name="phone" placeholder="Số điện thoại">
						</div>
						<!--============================================-->
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="email" placeholder="Email...">
						</div>
						<!--============================================-->
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="diachi" placeholder="Địa chỉ...">
						</div>
						<?php
							}
						?>
						<!--============================================-->
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
						<!--============================================-->
						<!--<div class="size14 trans-0-4 m-b-10">
							 Button
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Cập Nhật Đơn Hàng
							</button>
						</div> -->
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Tổng Tiền :
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<input type="text"  name="tongtien" readonly 
						value="<?php
								if(COUNT($cart) > 0)
								{
									$totaltien = $TOTAL + $phi;
									echo $totaltien;
								}
								else{echo "";} 
								?>" size="8">   đồng 
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<input class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit" value="Hoàn Tất Thanh Toán" name="thanhtoan">
				</div>
			</div>
		</div>
	</form>
	</section>
	<?php
		mysqli_close($conn);
		include_once('page/footer.php');
	?>
	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
<!--===============================================================================================-->
	<script>
		function updateItem(id)
		{
			sl = $("#quantity"+id).val();
			$.get("cart.php?id="+id+"&sl="+sl, function(data)
			{});
			location.reload();
		};
	</script>
<!--===============================================================================================-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--===============================================================================================-->
  
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
