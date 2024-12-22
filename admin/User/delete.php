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
    $sql = "DELETE FROM `user` WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header('location:dashboard.php?page_layout=user');
    ?>
</body>

</html>