<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .warning {
            color: red;
            margin-top: 10px;
        }
        input {
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form action="login.php" method="post">
            <div>
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div>
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
        <?php
        include('admin/ConnectDb/connect.php');
        session_start();
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $userName = $_POST['username'];
            $passWord = $_POST['password'];
            $sql = "SELECT * FROM `user` WHERE `username` = '$userName' AND `password` = '$passWord'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['username'] = $userName;
                header('Location: admin/DashBoard/dashboard.php');
                exit();
            } else {
                echo "<p class='warning'>Tên đăng nhập hoặc mật khẩu không chính xác</p>";
            }
        }
        ?>
    </div>
</body>

</html>