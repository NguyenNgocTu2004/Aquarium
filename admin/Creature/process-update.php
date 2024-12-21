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
         !empty($_POST['species']) &&
         !empty($_POST['description']) &&
         !empty($_POST['size']) &&
         !empty($_POST['habitat']) && 
         !empty($_POST['diet']) && 
         !empty($_POST['endangered_status'])){

            $id = $_GET['id'];
     
            $name = $_POST['name'];
            $species = $_POST['species'];
            $description = $_POST['description'];
            $size = $_POST['size'];
            $habitat = $_POST['habitat'];
            $diet = $_POST['diet'];
            $endangered_status = $_POST['endangered_status'];

             include('../ConnectDb/connect.php');
             $sql = "UPDATE `creature` SET `name`='$name',`species`=' $species',
             `description`='$description',`size`='$size',`habitat`='$habitat',`diet`='$diet',
             `endangered_status`=' $endangered_status' WHERE  id = '$id'"; 
             mysqli_query($conn,$sql);
             header('location:dashboard.php?page_layout=creature');
         }
         else{
             echo "Vui lòng nhập đầy đủ thông tin!";
         }
    ?>
</body>
</html>
