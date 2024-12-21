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
        if(!empty($_POST['name-area']) && 
        !empty($_POST['description'])){
            $id = $_GET['id'];
            $nameArea = $_POST['name-area'];
            $description = $_POST['description'];
            include('../ConnectDb/connect.php');
            $sql = "UPDATE `aquarium_area` SET `name`='$nameArea',`description`='$description' WHERE id = '$id'";
            mysqli_query($conn,$sql);
            header('location:dashboard.php?page_layout=aquarium-area');
        }
        else{
            echo "Vui lòng nhập đầy đủ thông tin!";
        }
    ?>
</body>
</html>