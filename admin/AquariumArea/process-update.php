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
        !empty($_POST['image']) &&
        !empty($_POST['image2']) &&
        !empty($_POST['image3']) &&
        !empty($_POST['name-area']) &&
        !empty($_POST['description'])
    ) {
        $id = $_GET['id'];
        $nameArea = $_POST['name-area'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $image2 = $_POST['image2'];
        $image3 = $_POST['image3'];
        include('../ConnectDb/connect.php');
        $sql = "UPDATE `aquarium_area` SET `name`='$nameArea',`description`='$description',
        `image`='../img/$image',`image2`='../img/$image2',`image3`='../img/$image3' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=aquarium-area');
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
</body>

</html>