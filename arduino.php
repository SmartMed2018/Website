<?php
$current = file_get_contents("get.txt");
$current .= json_encode($_GET)."\n";
file_put_contents("get.txt", $current );
require 'config.php';
$id_cart = 1;

echo "maybe this time";
if(isset($_GET["inUse"])=='1')
    echo "working";

if ($_GET)
    echo "working2";
 
 echo $_GET;  
    
/*
if (isset($_GET["inUse"]) && ($_GET["inUse"] == '1') && isset($_GET["scan"])){
    $sql=mysqli_query($conn,
    "INSERT INTO `Purchase`(`idOrder`, `idProduct`, `quantity`, `cost`)
      SELECT idOrder,'{$_GET["scan"]}', 1, (SELECT `price` FROM `Product` WHERE `idProduct` = '{$_GET["scan"]}' limit 1) FROM `Cart` WHERE `idCart` = {$id_cart}"
    ) or die('0');
    echo '1';
}
else {
    if (isset($_GET["inUse"]) && ($_GET["inUse"] == '0')) {
        $sql=mysqli_query($conn,"Update `Orders` SET endOfPurchase=1 Where idOrder = (Select idOrder From Cart Where idCart = {$id_cart})");
        $sql=mysqli_query($conn,"Update `Cart` SET inUse=0 Where idCart={$id_cart}");
    } else {

        $sql = mysqli_query($conn, "SELECT c.inUse, P.endOfPurchase, COALESCE(P.successPay, 0) as successPay
                                      FROM  `Orders` P 
                                      INNER JOIN Cart c
                                      ON P.idOrder = c.idOrder
                                      WHERE P.idCart = {$id_cart} ") or die('erorr set names 2 ');
        $num_row = mysqli_num_rows($sql);//number of row in db
        if ($num_row > 0) {
            while ($row = mysqli_fetch_assoc($sql))
                echo "#{$row['inUse']}{$row['endOfPurchase']}{$row['successPay']}#";

        } else {
            $sql=mysqli_query($conn,"SELECT * From  `Cart` Where idCart={$id_cart}");
            if ($num_row > 0) {
            while ($row = mysqli_fetch_assoc($sql))
                echo "#{$row['inUse']}00#";

            }
            else{
                echo "#000#";
            }
        }

    }
}

*/

?>
