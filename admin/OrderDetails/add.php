



<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (
            !empty($_POST['order_id']) &&
            !empty($_POST['souvenir_id']) &&
            !empty($_POST['quantity']) &&
            !empty($_POST['price'])
        ) {

            $order_id = $_POST['order_id'];
            $souvenir_id = $_POST['souvenir_id'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            include('../ConnectDb/connect.php');
            $sql = "INSERT INTO `order_detail`(`order_id`, `souvenir_id`, `quantity`, `price`) 
            VALUES ('$order_id','$souvenir_id','$quantity','$price')";
            // echo $sql;
            mysqli_query($conn, $sql);
            header('location:dashboard.php?page_layout=order_detail');
        } else {
            $error_message = "Vui lòng nhập đầy đủ thông tin!";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .row {
            margin-bottom: 15px;
        }

        .row p {
            margin: 0;
            color: #555;
        }

        .row input[type="text"],
        .row input[type="email"],
        .row input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .row b {
            color: red;
        }

        .add {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .add:hover {
            background-color: #218838;
        }

        .error-message {
            text-align: center;
            color: red;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <form action="dashboard.php?page_layout=add-order_detail" method="POST">
            <h1>Thêm Người Dùng</h1>
            <div class="row">
                <p>Mã oder<b>(*)</b></p>
                <input type="type" name="order_id">
            </div>
            <div class="row">
                <p>Mã quà lưu niệm<b>(*)</b></p>
                <input type="type" name="souvenir_id">
            </div>
            <div class="row">
                <p>số lượng<b>(*)</b></p>
                <input type="type" name="quantity">
            </div>
            <div class="row">
                <p>giá<b>(*)</b></p>
                <input type="type" name="price">
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <input class="add" type="submit" value="Thêm">
            </div>
            <?php if (isset($error_message)) { ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php } ?>
        </form>
    </div>
</body>

</html>