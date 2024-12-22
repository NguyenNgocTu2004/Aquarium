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
    $sql = "select * from `ticket` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $ticket = mysqli_fetch_assoc($result);

    ?>
    <form action="dashboard.php?page_layout=process-update-ticket&id=<?php echo $ticket['id'] ?>" method="POST">
        <div class="box">
            <h1>Cập nhật vé tham quan</h1>
            <div class="row">
                <p>Giá vé<b>(*)</b></p>
                <input type="text" name="price" value="<?php echo $ticket['price'] ?>">
            </div>
            <div class="row">
                <p>Hạng vé<b>(*)</b></p>
                <input type="text" name="type" value="<?php echo $ticket['type'] ?>">
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <textarea name="description"><?php echo $ticket['description'] ?></textarea>
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