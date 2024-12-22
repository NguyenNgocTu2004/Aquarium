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
        !empty($_POST['description']) &&
        !empty($_POST['start_date']) &&
        !empty($_POST['end_date'])
    ) {

        $id = $_GET['id'];

        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        include('../ConnectDb/connect.php');
        $sql = "UPDATE `event` SET `name`='$name',`description`='$description',`start_date`='$start_date',`end_date`='$end_date' WHERE  id = '$id'";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=event');
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
</body>

</html>