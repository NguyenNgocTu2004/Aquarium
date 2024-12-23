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
        .row input[type="number"],
        .row select {
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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['total_price']) &&
        !empty($_POST['status'])
    ) {

        $customer_name = $_POST['name'];
        $customer_email = $_POST['email'];
        $total_price = $_POST['total_price'];
        $status = $_POST['status'];

        include('../ConnectDb/connect.php');
        $sql = "INSERT INTO `order`(`customer_name`, `customer_email`, `total_price`, `status`)
         VALUES ('$customer_name','$customer_email','$total_price','$status')";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=order');
    } else {
        $error_message = "Vui lòng nhập đầy đủ thông tin!";
    }}
    ?>
    <div class="container">
        <form action="dashboard.php?page_layout=add-order" method="POST">
            <h1>Thêm Đơn Hàng</h1>
            <div class="row">
                <p>Tên khách hàng<b>(*)</b></p>
                <input type="text" name="name">
            </div>
            <div class="row">
                <p>Email khách hàng<b>(*)</b></p>
                <input type="email" name="email">
            </div>
            <div class="row">
                <p>Tổng giá<b>(*)</b></p>
                <input type="number" name="total_price">
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
                <input class="add" type="submit" value="Thêm">
            </div>
            <?php if (isset($error_message)) { ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php } ?>
        </form>
    </div>
</body>

</html>