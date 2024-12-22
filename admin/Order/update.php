<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row {
            margin-top: 20px;
        }

        b {
            color: red;
        }

        form {
            margin: 20px auto;
            width: 400px;
            background-color: antiquewhite;
            display: flex;
            justify-content: center;
        }

        .add {

            padding: 10px 20px;
            color: white;
            margin-bottom: 20px;
            background-color: green;
        }
    </style>
</head>

<body>
    <?php

    $id = $_GET['id'];
    $sql = "SELECT * FROM `order` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $order = mysqli_fetch_assoc($result);

    ?>
    <form action="dashboard.php?page_layout=process-update-order&id=<?php echo $order['id'] ?>" method="POST">
        <div class="box">
            <h1>Cập </h1>
            <div class="row">
                <p>Tên khách hàng<b>(*)</b></p>
                <input type="text" name="name" value="<?php echo $order['customer_name'] ?>">
            </div>

            <div class="row">
                <p>Email khách hàng<b>(*)</b></p>
                <input type="email" name="email" value="<?php echo $order['customer_email'] ?>">
            </div>

            <div class="row">
                <p>Tổng giá<b>(*)</b></p>
                <input type="number" name="total_price" value="<?php echo $order['total_price'] ?>">
            </div>

            <div class="row">
                <p>Trạng thái:<b>(*)</b></p>
                <select required name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <input class="add" type="submit" value="Cập nhật">
            </div>
        </div>
    </form>
    <?php


    ?>
</body>

</html>