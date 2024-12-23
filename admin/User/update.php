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
        .row input[type="password"],
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
    include('../ConnectDb/connect.php');
    $id = $_GET['id'];
    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['pass'])
    ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql_check_user = "SELECT * FROM `user` WHERE `username` = '$name'";
        $result_check_user = mysqli_query($conn, $sql_check_user);

        $sql_check_email = "SELECT * FROM `user` WHERE `email` = '$email'";
        $result_check_email = mysqli_query($conn, $sql_check_email);

        if (mysqli_num_rows($result_check_user) > 0) {
            $error_message = "Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.";
        } elseif (mysqli_num_rows($result_check_email) > 0) {
            $error_message = "Email đã được đăng ký. Vui lòng chọn email khác.";
        } else {
            $sql = "UPDATE `user` SET `username`='$name', `email`='$email',`password`='$pass' WHERE id = '$id'";
            // echo $sql;
            mysqli_query($conn, $sql);
            header('location:dashboard.php?page_layout=user');
        }
    } else {
        $error_message = "Vui lòng nhập đầy đủ thông tin!";
    }

    $sql = "select * from `user` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    ?>
    <div class="container">

        <form action="dashboard.php?page_layout=update-user&id=<?php echo $user['id'] ?>" method="POST">
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
                    <input type="text" name="pass" value="<?php echo $user['password'] ?>">
                </div>
                <div class="row" style="display: flex; justify-content: center;">
                </div>
                <div class="row" style="display: flex; justify-content: center;">
                    <input class="add" type="submit" value="Cập nhật">
                </div>
            </div>
            <?php if (isset($error_message)) { ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php } ?>
        </form>
    </div>
    <?php


    ?>
</body>

</html>