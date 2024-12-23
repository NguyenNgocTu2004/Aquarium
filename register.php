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

        .error-message {
            text-align: center;
            color: red;
            font-size: 12px;
            margin: 5px 0 10px 0;
        }
    </style>
</head>

<body>
    <?php
    include('admin/ConnectDb/connect.php');
    session_start();
    if (
        !empty($_POST['username']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password']) &&
        !empty($_POST['repassword'])
    ) {

        $name = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repass = $_POST['repassword'];

        $sql_check_user = "SELECT * FROM `user` WHERE `username` = '$name'";
        $result_check_user = mysqli_query($conn, $sql_check_user);


        $sql_check_email = "SELECT * FROM `user` WHERE `email` = '$email'";
        $result_check_email = mysqli_query($conn, $sql_check_email);

        if (mysqli_num_rows($result_check_user) > 0) {
            $errormsg = "Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.";
        } elseif (mysqli_num_rows($result_check_email) > 0) {
            $errormsg = "Email đã được đăng ký. Vui lòng chọn email khác.";
        } elseif ($pass == $repass) {

            $sql = "INSERT INTO `user`( `username`, `email`, `password`) VALUES ('$name','$email','$pass')";
            mysqli_query($conn, $sql);
            $_SESSION['register_success'] = "Đăng ký thành công! Vui lòng đăng nhập.";
            header('Location: login.php');
            exit(); 
        } else {
            $errormsg = "Mật khẩu và nhập lại mật khẩu không chính xác";
        }
    } else {
        $errormsg = "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
    <div class="login-container">
        <h2>Đăng ký</h2>
        <form action="register.php" method="post">
            <div>
                <input style="width: 270px;" type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div>
                <input style="width: 270px;" type="text" name="email" placeholder="Email" required>
            </div>
            <div>
                <input style="width: 270px;" type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div>
                <input style="width: 270px;" type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>
            </div>
            <div class="error-message">
                <?php echo $errormsg; ?>
            </div>
            <input style="display:none;" type="text" name="success">
            <div>
                <input type="submit" value="Đăng nhập">
            </div>

        </form>
    </div>
</body>

</html>