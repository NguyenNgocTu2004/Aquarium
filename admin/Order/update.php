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
        .row input[type="date"],
        .row input[type="file"],
        .row textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .row textarea {
            resize: vertical;
            height: 100px;
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
                    <option value="Pending" <?php if($order['status'] == 'Pending') echo 'selected'?>>Pending</option>
                    <option value="Completed" <?php if($order['status'] == 'Completed') echo 'selected'?>>Completed</option>
                    <option value="Cancelled" <?php if($order['status'] == 'Cancelled') echo 'selected'?>>Cancelled</option>
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