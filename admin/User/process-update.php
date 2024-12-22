<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    trang thực hiện update
    <?php
    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['pass'])
    ) {

        $id = $_GET['id'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        include('../ConnectDb/connect.php');
        $sql = "UPDATE `user` SET `username`='$name', `email`='$email',`password`='$pass' WHERE id = '$id'";
        // echo $sql;
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=user');
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
</body>

</html>