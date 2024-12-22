<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['total_price']) &&
        !empty($_POST['status'])
    ) {

        $id = $_GET['id'];

        $customer_name = $_POST['name'];
        $customer_email = $_POST['email'];
        $total_price = $_POST['total_price'];
        $status = $_POST['status'];
        include('../ConnectDb/connect.php');
        $sql = "UPDATE `order` SET `customer_name`='$customer_name',`customer_email`='$customer_email',
            `total_price`='$total_price',`status`='$status' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=order');
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
</body>

</html>