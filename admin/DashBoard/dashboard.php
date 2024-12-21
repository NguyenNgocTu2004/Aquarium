<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        nav{
            background-color:rgb(177, 193, 216);
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        a{
            text-decoration: none;
            color: red;
            margin: 0 20px 0 20px;
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
            <a href="dashboard.php?page_layout=ticket">Ticket</a>
            <a href="dashboard.php?page_layout=souvenir">Souvenir</a>
            <a href="dashboard.php?page_layout=order">Order</a>
            <a href="dashboard.php?page_layout=event">Event</a>
            <a href="dashboard.php?page_layout=order_detail">Order_detail</a>
            <a href="dashboard.php?page_layout=creature">Creature</a>
        </div> 
    </nav>
    <?php
        include('../ConnectDb/connect.php');
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                //case AquariumArea
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
                //close AquariumArea 

                //case user
                 case "user":
                    include('../User/show.php');
                    break;
                case "add-user":
                    include('../User/add.php');
                    break; 
                case "delete-user":
                    include('../User/delete.php');
                    break; 
                case "update-user":
                    include('../User/update.php');
                    break; 
                case "process-update-user":
                    include('../User/process-update.php');
                    break; 
                //close user 

                //case Ticket
                case "ticket":
                    include('../Ticket/show.php');
                    break;
                case "add-ticket":
                    include('../Ticket/add.php');
                    break; 
                case "delete-ticket":
                    include('../Ticket/delete.php');
                    break; 
                case "update-ticket":
                    include('../Ticket/update.php');
                    break; 
                case "process-update-ticket":
                    include('../Ticket/process-update.php');
                    break; 
                //close Ticket

                //case Souvenir
                case "souvenir":
                    include('../Souvenir/show.php');
                    break;
                case "add-souvenir":
                    include('../Souvenir/add.php');
                    break; 
                case "delete-souvenir":
                    include('../Souvenir/delete.php');
                    break; 
                case "update-souvenir":
                    include('../Souvenir/update.php');
                    break; 
                case "process-update-souvenir":
                    include('../Souvenir/process-update.php');
                    break; 
                //close TSouvenir

                //case Order
                case "order":
                    include('../Order/show.php');
                    break;
                case "add-order":
                    include('../Order/add.php');
                    break; 
                case "delete-order":
                    include('../Order/delete.php');
                    break; 
                case "update-order":
                    include('../Order/update.php');
                    break; 
                case "process-update-order":
                    include('../Order/process-update.php');
                    break; 
                //close Order
                //case event
                case "event":
                    include('../Event/show.php');
                    break;
                case "add-event":
                    include('../Event/add.php');
                    break; 
                case "delete-event":
                    include('../Event/delete.php');
                    break; 
                case "update-event":
                    include('../Event/update.php');
                    break; 
                case "process-update-event":
                    include('../Event/process-update.php');
                    break; 
                //close event
                //case order_detail
                case "order_detail":
                    include('../OrderDetails/show.php');
                    break;
                //close order_detail

                //case creature
                case "creature":
                    include('../Creature/show.php');
                    break;
                case "add-creature":
                    include('../Creature/add.php');
                    break; 
                case "delete-creature":
                    include('../Creature/delete.php');
                    break; 
                case "update-creature":
                    include('../Creature/update.php');
                    break; 
                case "process-update-creature":
                    include('../Creature/process-update.php');
                    break; 
                //close creature
                
            }
        }
    ?>
</body>
</html>