<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/area.css">
    <title>Dolphin Aquarium</title>
    <style>
        .time-open {
            color: white; 
            transform: translateX(15%);
            font-family: Arial; 
            font-size: 12px;
        }

        .clock {
            transform: translateY(6px);
            margin-right: 4px;
        }
    </style>
</head>
<body>
    <video autoplay loop muted  id="background-video">
        <source src="video/y2mate.com - OCEAN LOOP_1080p.mp4" type="video/mp4">
    </video>
    <div class="navs">
        <img class="lg" src="img/logo1.png" alt="">
        <!-- <div class="srch-box">
            <i class='bx bx-search-alt-2 srch-icon' style='color:#ffffff'></i>
            <input class="srch-input" type="text" name="" id="">
        </div> -->
        <div class="time-open">
            <box-icon class="clock" name='time-five' color='#ffffff' ></box-icon>Open 9am - 6pm
        </div>
        <div class="nbar">
            <li class="nv-item">
                <a href="aquarium.php?page_layout=home">Home</a>
            </li>
            <li class="nav-item">
                <a href="aquarium.php?page_layout=event">Events</a>
            </li>
            <li class="nav-item">
                <a href="aquarium.php?page_layout=aquarium-area">Aquarium Areas</a>
            </li>
            <!-- <li class="nv-item">
                <a href="">Shop</a>
            </li>
            <div class="drp-dwn">
                <li class="nv-item">
                    <a href="#">
                        More
                        <img class="btn-drpdwn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAYhJREFUSEvtlbtKA2EQhb8jglaipWJnoYiNBK21s9NafIKAF3yAgFhbRBSfIL2WVlqKYCMKNtpYWFh4qRQkYwY2srnuJVnTZLpld873z5l/Z0SPQj3i0gf/m/O9t9rMRoEjYDKjsp+BTUnvrv9XsZntAgcZQauy25IO68FTwD0wlBH8G5iV9FQD9gczywPHGYHzkk6q2g2Xy8wugKUuw88lrYQ1m4HHA8vHugR/A6YlvbYFB5avAqddAq9JOqvXavkfm1kJWO8QXpK00UyjHXgEeADc+jTxAsxI+kwEDiz3S+aXLU0sS7pslRg5Ms2sCGwlJBcrE2qnXU4c8DBwB/iAiRPennlJXx2BA8tzwBUwGEH+AXKSbqNOGFlxVcDMCpXZvhchWJC0HwX190nAA8C1V9RC+AZYlFTuKjiw3Pvs/fa+h8P7OSfpMQ40UcUhy5stkpoFEAce2+qwWN0iaVgAWYIngn47Y0GST6lEkarioN++vcqSPhIRg49Tg9PAwjl9cKcOxs7/Be3rbB+gqr8ZAAAAAElFTkSuQmCC"/>                    </a>
                </li>   
                <ul class="drpdwn-menu">
                    <li class="drpdwn-item">
                        <a href="about.html">About Us</a>
                    </li>
                    <li class="drpdwn-item">
                        <a href="">Contact Us</a>
                    </li>
                </ul>
            </div>   -->
        </div>
    </div>
    <?php
        include('ConnectDb/connect.php');
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case "home":
                    include('home.php');
                    break;
                case "event":
                    include('event.php');
                    break; 
                case "aquarium-area":
                    include('aquariumArea.php');
                    break; 
            }
        } else {
            include('home.php');
        }
    ?>
</body>
</html>