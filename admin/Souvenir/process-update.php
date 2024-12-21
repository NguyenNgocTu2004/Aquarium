<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
         if(!empty($_POST['name']) && 
         !empty($_POST['description']) && 
         !empty($_POST['price']) && 
         !empty($_POST['stock'])){

            $id = $_GET['id'];
     
             $name = $_POST['name'];
             $description = $_POST['description'];
             $image = $_POST['image'];
             $price = $_POST['price'];
             $stock = $_POST['stock'];
             include('../ConnectDb/connect.php');
             $sql = "UPDATE `souvenir` SET `name`='$name',`description`='$description',`price`='$price',`stock`='$stock' WHERE  id = '$id'"; 
             mysqli_query($conn,$sql);
             header('location:dashboard.php?page_layout=souvenir');
         }
         else{
             echo "Vui lòng nhập đầy đủ thông tin!";
         }
    ?>
</body>
</html>
