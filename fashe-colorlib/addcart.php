<?php
session_start();
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
                                    //tăng số lượng lên 1
                                    $_SESSION['cart'][$id]+= $sl;
                             }
                            else //nếu chưa có trong session
                            {
                                    $_SESSION['cart'][$id] = $sl; //mặc định 1
                            }
        }
    mysqli_close($conn);
    header('Location: cart.php');

?>