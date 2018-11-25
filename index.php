<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Discount Program</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
   <form method="post" name="productForm">
    <select name="items" id="items">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
    </select>
    <input type="submit" value="Order">
   </form>
    <?php 
            session_start();
            include("discountClass.php");
            $obj = new UnidaysDiscountChallenge();
            if($_POST){
                $item = $_POST['items'];
                $obj->addtoBasket($item);
            }  
    ?>
    <br><br>
    <table style="width:25%">
    <?php
        if(isset($_SESSION['basket'])){
        foreach ($_SESSION['basket'] as $key => $value) {
             
    ?>
    <tr>
        <td><? echo $key;?></td>
        <td><? echo $value;?></td>
    </tr>
    <?php 
        }?>
    <tr>
        <td>Cart Total</td>
        <td><? echo $_SESSION['totalPrice'];?></td>
    </tr>
    <tr>
        <td>Delivery Charge</td>
        <td><? echo $_SESSION['delivery'];?></td>
    </tr>
    <tr>
        <td>Total Cost</td>
        <td><? echo $_SESSION['delivery']+$_SESSION['totalPrice'];?></td>
    </tr>
   <? } 
    ?>
</table> 




</body>
</html>