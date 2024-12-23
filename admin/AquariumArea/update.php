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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
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
        .row input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        .row input[type="text"]:focus,
        .row input[type="file"]:focus {
            border-color: #28a745;
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
            transition: background-color 0.3s ease;
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
    $id = $_GET['id'];
    $sql = "select * from `aquarium_area` where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $aquariumArea = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="dashboard.php?page_layout=process-update-aquarium-area&id=<?php echo $aquariumArea['id'] ?>" method="POST">
            <h1>Cập nhật khu vực tham quan</h1>
            <div class="row">
                <p>Tên khu vực<b>(*)</b></p>
                <input type="text" name="name-area" value="<?php echo $aquariumArea['name'] ?>">
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <input type="text" name="description" value="<?php echo $aquariumArea['description'] ?>">
            </div>
            <div class="row">
                <p>Ảnh<b>(*)</b></p>
                <input type="file" name="image" value="<?php echo $aquariumArea['image'] ?>">
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <input class="add" type="submit" value="Cập nhật">
            </div>
        </form>
    </div>
</body>

</html>