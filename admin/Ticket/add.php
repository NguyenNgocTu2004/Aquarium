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
        !empty($_POST['name-ticket']) &&
        !empty($_POST['description'])
    ) {
        $price = $_POST['price'];
        $nameTicket = $_POST['name-ticket'];
        $description = $_POST['description'];
        include('../ConnectDb/connect.php');
        $sql = "INSERT INTO `ticket`(`price`,`type`, `description`) VALUES ('$price','$nameTicket','$description')";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=ticket');
    } else {
        $error_message = "Vui lòng nhập đầy đủ thông tin!";
    }}
    ?>
    <div class="container">
        <form action="dashboard.php?page_layout=add-ticket" method="POST">
            <h1>Thêm Vé Tham Quan</h1>
            <div class="row">
                <p>Giá vé<b>(*)</b></p>
                <input type="text" name="price">
            </div>
            <div class="row">
                <p>Hạng vé<b>(*)</b></p>
                <input type="text" name="name-ticket">
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <textarea name="description"></textarea>
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