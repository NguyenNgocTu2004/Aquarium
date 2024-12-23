<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/themify-icons/themify-icons.css" />
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/area.css">
    <link rel="stylesheet" href="css/area-detail.css">
    <title>Dolphin Aquarium</title>
    <style>
        .time-open {
            color: white;
            font-family: Arial;
            font-size: 12px;
            text-align: center;
        }

        .clock {
            transform: translateY(6px);
            margin-right: 4px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['role']) && $_SESSION['role'] !== 'User') {
        header('Location:../../login.php');
        exit();
    }
    ?>

    <video autoplay loop muted id="background-video">
        <source src="video/y2mate.com - OCEAN LOOP_1080p.mp4" type="video/mp4">
    </video>
    <div class="navs">
        <img class="lg" src="img/logo1.png" alt="">
        <div class="time-open">
            <box-icon class="clock" name='time-five' color='#ffffff'></box-icon>Giờ mở cửa:Thứ 2 - Chủ nhật: 9:30 - 22:00
        </div>
        <div class="nbar">
            <li class="nv-item">
                <a href="aquarium.php?page_layout=home">Home</a>
            </li>
            <li class="nav-item">
                <a href="aquarium.php?page_layout=event">Events</a>
            </li>

            <li class="nv-item">
                <a href="">Shop</a>
            </li>
            <div class="drp-dwn">
                <li class="nav-item">
                    <a href="aquarium.php?page_layout=aquarium-area&id=1">Aquarium Areas</a>
                </li>
                <ul class="drpdwn-menu">
                    <li class="drpdwn-item">
                        <a href="aquarium.php?page_layout=area-detail&id=1">Area</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    include('ConnectDb/connect.php');
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case "home":
                include('home.php');
                break;
            case "event":
                include('event.php');
                break;
            case "aquarium-area":
                include('aquariumArea.php');
                break;
            case "area-detail":
                include('areaDetail.php');
                break;
        }
    } else {
        include('home.php');
    }
    ?>
</body>

</html>