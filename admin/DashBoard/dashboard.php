<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        nav{
            background-color: #0d6efd;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        a{
            text-decoration: none;
        }

        a:hover{
            background-color: #0dcaf0;
        }
    </style>
</head>
<body>
    <nav>
        <div>
            <a href="dashboard.php?page_layout=aquarium-area">Aquarium Area</a>
            <a href="dashboard.php?page_layout=user">User</a>
        </div> 
    </nav>
    <?php
        include('../ConnectDb/connect.php');
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case "aquarium-area":
                    include('../AquariumArea/show.php');
                    break;
                case "add-aquarium-area":
                    include('../AquariumArea/add.php');
                    break; 
                case "delete-aquarium-area":
                    include('../AquariumArea/delete.php');
                    break; 
                case "update-aquarium-area":
                    include('../AquariumArea/update.php');
                    break; 
                case "process-update-aquarium-area":
                    include('../AquariumArea/process-update.php');
                    break; 
            }
        }
    ?>
</body>
</html>