<?php
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
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"
  			integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw="
  			crossorigin="anonymous">
  	</script>
</head>
<body>
		<label>--Tỉnh/Thành Phố--</label>
		<select name="province" id="province">
			<option value="">&nbsp;&nbsp;&nbsp;&nbsp;---Chọn Tỉnh---</option>
			<?php
				$query="SELECT * FROM province";
				$result=mysqli_query($conn,$query);
				while ($obj=mysqli_fetch_object($result)) 
				{
					echo '<option value="'.$obj->IdProvince.'">'.$obj->Name.'</option>';
				}
			?>
		</select>
		<!--======================================-->
		<label>--Huyện/Quận--</label>
		<select name="district" id="district">
			<option value="">---Chưa Chọn Tỉnh---</option>
		</select>
		<!--======================================-->
		<label>--Phường/Xã--</label>
		<select name="ward" id="ward">
			<option value="">---Chưa Chọn Huyện---</option>
		</select>
		<script type="text/javascript">
			jquery(document).ready(function($)
			{
				$("#province").change(function(event)
				{
					$provinceId = $("province").val();
					$.post('district.php',{"provinceid":provinceId},function(data,textStatus,xhr)
					{
						$("district").html(data);
					});

				});
			});
		</script>
</body>
</html>