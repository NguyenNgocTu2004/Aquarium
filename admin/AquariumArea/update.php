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
            alig-item: center;
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
    $sql = "select * from `aquarium_area` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $aquariumArea = mysqli_fetch_assoc($result);

    ?>
    <form action="dashboard.php?page_layout=process-update-aquarium-area&id=<?php echo $aquariumArea['id'] ?>" method="POST">
        <div class="box">
            <h1>Cập nhật khu vực tham quan</h1>
            <div class="row">
                <p>Tên khu vực<b>(*)</b></p>
                <input type="text" name="name-area" value="<?php echo $aquariumArea['name'] ?>" readonly>
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <input type="text" name="description" value="<?php echo $aquariumArea['description'] ?>">
            </div>
            <div class="row">
                <p>Ảnh khu vực<b>(*)</b></p>
                <img src="" alt="">
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