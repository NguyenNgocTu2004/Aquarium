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