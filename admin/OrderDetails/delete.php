<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $sql = "DELETE FROM `order_detail` WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header('location:dashboard.php?page_layout=order_detail');
    ?>
</body>

</html>