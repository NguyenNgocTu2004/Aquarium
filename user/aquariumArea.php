<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .flex-ct {
            display: flex;
        }

        .buttons {
            margin-top: 20px;
        }

        .btn-dcm {
            margin-right: 30px;
            width: 144px;
            height: 45px;
            border-radius: 20px;
            background: rgb(255, 255, 255, 0.2);
            border: solid 2px rgb(255, 255, 255, 0.2);
            color: #FFFFFF;
            outline: none;
        }

        .btn-dcm:hover {
            background: rgb(189, 189, 189, 0.7);
            color: white
        }

        .content {
            position: relative;
            z-index: 0;
            background: rgba(0, 35, 72, 0.7);
            width: 90%;
            height: 750px;
            border-radius: 10px;
            display: flex;
            transform: translate(5.5%, 5%);
            margin-bottom: 200px;
        }

        .content-1 {
            height: 100%;
            width: 35%;
        }

        .content-title h1 {
            color: #fff;
            font-size: 44px;
            font-family: 'Irish Grover', sans-serif;
            letter-spacing: 2px;
        }

        .atv-small {
            padding-left: 70px;
        }

        .atv-small a {
            display: block;
            color: #fff;
            text-decoration: none;
            text-align: left;
            font-size: 24px;

            line-height: 90px;
            -webkit-text-stroke: 0.4px #620808;
            font-weight: 600;
        }

        .atv-small a:active {
            color: aqua;
        }

        .atv-small a:hover {
            transform: translateY(-2px);
            text-shadow: 2px 2px 5px rgb(255, 255, 255);
        }

        .content-2 {
            height: 100%;
            width: 35%;
        }

        .content-2 img {
            border-radius: 10px;
            width: 260px;
            height: 380px;
            padding-top: 135px;
            transform: rotate(8deg);
            opacity: 70%;
            padding-right: 15px;
        }

        .content-3 {
            height: 100%;
            width: 30%;
        }

        .document p {
            color: #fff;
            text-align: left;
            font-size: 24px;
            -webkit-text-stroke: 0.6px #620808;
            font-weight: 600;
            padding-top: 180px;
            line-height: 35px;
        }

        .nav-content {
            width: 30%;
            float: right;
            padding-right: 25px;
        }

        .navbar-event {

            margin-top: 30px;
            width: 112px;
            height: 50px;
            border-radius: 100px;
            background: #002F60;
            color: #fff;
            outline: none;
            display: block;
        }

        .icon p {
            margin-right: 30px;
            text-align: left;
            font-size: 50px;
            margin: 0;
            padding-right: 100px;
            text-indent: 0;
        }

        .icon button {
            font-size: 15px;
        }

        .navbar-icon {
            margin-top: 6px;
            margin-right: 70px;
            width: 112px;
            height: 50px;
            border-radius: 100px;
            background: #002F60;
            color: #fff;
            outline: none;
            display: block;
            float: right;
        }
        .text {
            margin-top: 50px;
            transform: translateX(-30px);
            color: #fff;
            font-family: 'Itim', cursive;
        }
        .text button {
            color: #fff;
            width: 50px;
            border-radius: 10px;
            background-color: #002F60;
        }
    </style>
</head>

<body>

    <div class="main">
        <div class="ct">
            <div class="flex-ct">
                <div class="content-1">
                    <div class="content-title">
                        Aqarium Area
                    </div>
                    <div class="atv-small">
                        <?php
                        include('ConnectDb/connect.php');
                        $sql = "SELECT * FROM `aquarium_area` WHERE 1";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <a href="aquarium.php?page_layout=aquarium-area&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="content-2">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql1 = "SELECT `image` FROM `aquarium_area` WHERE id = $id";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $imageArea = $row1['image'];
                    } else {
                        $sql1 = "SELECT `image` FROM `aquarium_area` LIMIT 1";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $imageArea = $row1['image'];
                    }
                    ?>
                    <img src="<?php echo $imageArea; ?>" alt="" />
                </div>
                <div class="content-3">
                    <div class="document">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql1 = "SELECT `description` FROM `aquarium_area` WHERE id = $id";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $descriptionArea = $row1['description'];
                        } else {
                            $sql1 = "SELECT `description` FROM `aquarium_area` LIMIT 1";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $descriptionArea = $row1['description'];
                        }
                        ?>
                        <p>
                            <?php echo $descriptionArea; ?>
                        </p>
                        <div class="text">
                            Tham quan thêm ở đây → 
                            <button class="btn-travel" onclick="window.location.href='aquarium.php?page_layout=area-detail&id=<?php echo $id?>'">
                                Go
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>