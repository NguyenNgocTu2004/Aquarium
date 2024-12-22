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
        !empty($_POST['price']) &&
        !empty($_POST['type']) &&
        !empty($_POST['description'])
    ) {

        $id = $_GET['id'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        include('../ConnectDb/connect.php');
        $sql = "UPDATE `ticket` SET `price`='$price', `type`='$type',`description`='$description' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=ticket');
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
</body>

</html>