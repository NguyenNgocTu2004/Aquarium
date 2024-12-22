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
    $sql = "select * from `creature` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $creature = mysqli_fetch_assoc($result);

    ?>
    <form action="dashboard.php?page_layout=process-update-creature&id=<?php echo $creature['id'] ?>" method="POST">
        <div class="box">
            <h1>Cập nhật creature</h1>
            <div class="row">
                <p>Tên<b>(*)</b></p>
                <input type="text" name="name" value="<?php echo $creature['name'] ?>">
            </div>

            <div class="row">
                <p>Loài<b>(*)</b></p>
                <input type="text" name="species" value="<?php echo $creature['species'] ?>">
            </div>

            <div class="row">
                <p>Ảnh<b>(*)</b></p>
                <input type="file" name="image" value="<?php echo $creature['image'] ?>">
            </div>

            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <textarea name="description"><?php echo $creature['description'] ?></textarea>
            </div>

            <div class="row">
                <p>Kích thước<b>(*)</b></p>
                <input type="number" name="size" value="<?php echo $creature['size'] ?>">
            </div>

            <div class="row">
                <p>Môi trường sống<b>(*)</b></p>
                <input type="text" name="habitat" value="<?php echo $creature['habitat'] ?>">
            </div>

            <div class="row">
                <p>Chế độ ăn<b>(*)</b></p>
                <input type="text" name="diet" value="<?php echo $creature['diet'] ?>">
            </div>

            <div class="row">
                <p>trạng thái bảo tồn<b>(*)</b></p>
                <select name="endangered_status" value="<?php echo $creature['endangered_status'] ?>">
                    <option value="Not Endangered">Không bị đe dọa</option>
                    <option value="Endangered">Bị đe dọa</option>
                    <option value="Critically Endangered">Gần như tuyệt chủng</option>
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