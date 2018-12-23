<option>--Chọn Quận/Huyện--</option>
<?php
	$host="localhost";
    $user="Phung";
    $pass="Phung1999";
    $dataname="onlineshop";
    $conn=mysqli_connect($host,$user,$pass,$dataname);
    mysqli_query($conn,"SET NAMES utf8");
    if(!$conn)
    	echo "Kết nối CSDL thất bại".mysqli_connect_error($conn);
    $query="SELECT * FROM district WHERE Provincal=".$_POST["provinceid"];
    $result=mysqli_query($conn,$query);
				while ($obj=mysqli_fetch_object($result)) 
				{
					echo '<option value="'.$obj->IdDistrict.'">'.$obj->Name.'</option>';
				}
?>