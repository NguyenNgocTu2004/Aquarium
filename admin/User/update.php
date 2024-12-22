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
    $sql = "select * from `user` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    ?>
    <form action="dashboard.php?page_layout=process-update-user&id=<?php echo $user['id'] ?>" method="POST">
        <div class="box">
            <h1>Cập username</h1>
            <div class="row">
                <p>username<b>(*)</b></p>
                <input type="text" name="name" value="<?php echo $user['username'] ?>">
            </div>
            <div class="row">
                <p>email<b>(*)</b></p>
                <input type="text" name="email" value="<?php echo $user['email'] ?>">
            </div>
            <div class="row">
                <p>password<b>(*)</b></p>
                <input type="password" name="pass" value="<?php echo $user['password'] ?>">
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