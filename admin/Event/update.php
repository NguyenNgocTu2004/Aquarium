<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row{
            margin-top: 20px;
        }

        b{
            color: red;
        }

        form{
            margin: 20px auto;
            width: 400px;
            background-color: antiquewhite;
            display: flex;
            justify-content: center;
        }
        .add{
           
            padding: 10px 20px;
            color: white;
            margin-bottom: 20px;
            background-color: green;
        }
    </style>
</head>
<body>
    <?php

        $id = $_GET['id'];
        $sql= "select * from `event` where id = '$id'";
        $result = mysqli_query($conn, $sql);
        $event = mysqli_fetch_assoc($result);

?>
    <form action="dashboard.php?page_layout=process-update-event&id=<?php echo $event['id'] ?>" method="POST">
        <div class="box">   
            <h1>Cập nhật Event</h1>
            <div class="row">
                <p>Tên sự kiện<b>(*)</b></p>
                <input type="text" name="name" value="<?php echo $event['name'] ?>">
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <textarea name="description"></textarea value="<?php echo $event['description'] ?>">
            </div>
            <div class="row">
                <p>Ngày bắt đầu<b>(*)</b></p>
                <input type="date" name="start_date" value="<?php echo $event['start_date'] ?>">
            </div>
            <div class="row">
                <p>Ngày kết thúc<b>(*)</b></p>
                <input type="date" name="end_date" value="<?php echo $event['end_date'] ?>">
            </div>
            <div class="row">
                <p>Hình ảnh<b>(*)</b></p>
                <img src="" alt="">
            </div>
            <div class="row" style="display: flex; justify-content: center;">
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <input class="add" type="submit" value="Cập nhật">
            </div>
        </div>
    </form>
    <?php

        
    ?>
</body>
</html>