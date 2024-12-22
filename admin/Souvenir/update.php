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
    $sql = "select * from `souvenir` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $souvenir = mysqli_fetch_assoc($result);

    ?>
    <form action="dashboard.php?page_layout=process-update-souvenir&id=<?php echo $souvenir['id'] ?>" method="POST">
        <div class="box">
            <h1>Cập nhật vé tham quan</h1>
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
                <input type="file" name="image" value="<?php echo $creature['image'] ?>">
            </div>
            <div class="row">
                <p> price<b>(*)</b></p>
                <input type="text" name="price" value="<?php echo $souvenir['price'] ?>">
            </div>
            <div class="row">
                <p>stock<b>(*)</b></p>
                <input type="text" name="stock" value="<?php echo $souvenir['stock'] ?>">
            </div>
            <div class="row" style="display: flex; justify-content: center;">
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