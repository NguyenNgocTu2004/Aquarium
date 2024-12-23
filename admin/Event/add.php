<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .row {
            margin-bottom: 15px;
        }

        .row p {
            margin: 0;
            color: #555;
        }

        .row input[type="text"],
        .row input[type="date"],
        .row input[type="file"],
        .row textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .row textarea {
            resize: vertical;
            height: 100px;
        }

        .row b {
            color: red;
        }

        .add {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .add:hover {
            background-color: #218838;
        }

        .error-message {
            text-align: center;
            color: red;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    if (!empty($_POST['image']) &&
        !empty($_POST['name']) &&
        !empty($_POST['description']) &&
        !empty($_POST['start_date']) &&
        !empty($_POST['end_date'])
    ) {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        include('../ConnectDb/connect.php');
        $sql = "INSERT INTO `event`( `name`, `description`, `image`,
        `start_date`, `end_date`) 
        VALUES ('$name','$description','../img/$image','$start_date','$end_date')";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=event');
    } else {
        $error_message = "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
    <div class="container">
        <form action="dashboard.php?page_layout=add-event" method="POST">
            <h1>Thêm Sự Kiện</h1>
            <div class="row">
                <p>Tên sự kiện<b>(*)</b></p>
                <input type="text" name="name">
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <textarea name="description"></textarea>
            </div>
            <div class="row">
                <p>Ngày bắt đầu<b>(*)</b></p>
                <input type="date" name="start_date">
            </div>
            <div class="row">
                <p>Ngày kết thúc<b>(*)</b></p>
                <input type="date" name="end_date">
            </div>
            <div class="row">
                <p>Ảnh<b>(*)</b></p>
                <input type="file" name="image">
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <input class="add" type="submit" value="Thêm">
            </div>
            <?php if (isset($error_message)) { ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php } ?>
        </form>
    </div>
</body>

</html>