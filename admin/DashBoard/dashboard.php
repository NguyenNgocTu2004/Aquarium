<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Aquarium</title>
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- css -->
    <link rel="stylesheet" href="../css/db.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
    </style>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
        header('Location:../../login.php');
        exit();
    }
    ?>
    <div class="navs">
        <div class="navbar">
            <li class="nav-item">
                <a href="dashboard.php?page_layout=aquarium-area">Khu vực Hồ Cá</a>
            </li>
            <li class="nav-item">
                <a href="dashboard.php?page_layout=user">Người dùng</a>
            </li>
            <li class="nav-item">
                <a href="dashboard.php?page_layout=ticket">Vé tham quan</a>
            </li>
            <li class="nav-item">
                <a href="dashboard.php?page_layout=souvenir">Quà lưu niệm</a>
            </li>

            <li class="nav-item">
                <a href="dashboard.php?page_layout=event">Sự kiện</a>
            </li>

            <li class="nav-item">
                <a href="dashboard.php?page_layout=creature">Sinh vật</a>
            </li>
            <div class="drop-down">
                <li class="nav-item">
                    <a href="">
                        Đơn hàng
                        <img class="button-dropdown" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAYhJREFUSEvtlbtKA2EQhb8jglaipWJnoYiNBK21s9NafIKAF3yAgFhbRBSfIL2WVlqKYCMKNtpYWFh4qRQkYwY2srnuJVnTZLpld873z5l/Z0SPQj3i0gf/m/O9t9rMRoEjYDKjsp+BTUnvrv9XsZntAgcZQauy25IO68FTwD0wlBH8G5iV9FQD9gczywPHGYHzkk6q2g2Xy8wugKUuw88lrYQ1m4HHA8vHugR/A6YlvbYFB5avAqddAq9JOqvXavkfm1kJWO8QXpK00UyjHXgEeADc+jTxAsxI+kwEDiz3S+aXLU0sS7pslRg5Ms2sCGwlJBcrE2qnXU4c8DBwB/iAiRPennlJXx2BA8tzwBUwGEH+AXKSbqNOGFlxVcDMCpXZvhchWJC0HwX190nAA8C1V9RC+AZYlFTuKjiw3Pvs/fa+h8P7OSfpMQ40UcUhy5stkpoFEAce2+qwWN0iaVgAWYIngn47Y0GST6lEkarioN++vcqSPhIRg49Tg9PAwjl9cKcOxs7/Be3rbB+gqr8ZAAAAAElFTkSuQmCC" /> </a>
                </li>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a href="dashboard.php?page_layout=order_detail">Chi tiết đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.php?page_layout=order">Đặt hàng</a>
                    </li>
                </ul>
            </div>
            <li class="nav-item">
                <a href="dashboard.php?page_layout=logout">Đăng xuất</a>
            </li>
        </div>
    </div>

    <?php
    include('../ConnectDb/connect.php');
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {

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
            case "search-user":
                include('../User/search.php');
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
                //case login
            case "logout":
                session_destroy();
                session_unset();
                header('location:../../login.php');
                break;
        }
    }
    ?>
</body>

</html>