<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm lưu niệm</title>
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

        .current-image {
            margin-left: 10px;
            color: #555;
        }
    </style>
</head>

<body>
    <?php
    include('../ConnectDb/connect.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `souvenir` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $souvenir = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="dashboard.php?page_layout=process-update-souvenir&id=<?php echo $souvenir['id'] ?>" method="POST">
            <h1>Cập nhật sản phẩm lưu niệm</h1>
            <div class="row">
                <p>Tên sản phẩm<b>(*)</b></p>
                <input type="text" name="name" value="<?php echo $souvenir['name'] ?>">
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <input type="text" name="description" value="<?php echo $souvenir['description'] ?>">
            </div>
            <div class="row">
                <p>Ảnh<b>(*)</b></p>
                <input type="file" name="image">
                <span class="current-image">Hiện tại: <?php echo basename($souvenir['image']); ?></span>
            </div>
            <div class="row">
                <p>Giá<b>(*)</b></p>
                <input type="text" name="price" value="<?php echo $souvenir['price'] ?>">
            </div>
            <div class="row">
                <p>Số lượng<b>(*)</b></p>
                <input type="text" name="stock" value="<?php echo $souvenir['stock'] ?>">
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <input class="add" type="submit" value="Cập nhật">
            </div>
        </form>
    </div>
</body>

</html>