<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (
        !empty($_POST['order_id']) &&
        !empty($_POST['souvenir_id']) &&
        !empty($_POST['quantity']) &&
        !empty($_POST['price'])
    ) {

        $id = $_GET['id'];

        $order_id  = $_POST['order_id'];
        $souvenir_id  = $_POST['souvenir_id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        include('../ConnectDb/connect.php');
        $sql = "UPDATE `order_detail` SET `order_id`='$order_id',
        `souvenir_id`='$souvenir_id',`quantity`='$quantity',`price`='$price' WHERE id = '$id' ";
            // echo $sql;
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=order_detail');
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
</body>

</html>