<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sinh vật</title>
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
            margin-top: 150px;
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

        .current-image {
            margin-left: 10px;
            color: #555;
        }
    </style>
</head>

<body>
    <?php
    include('../ConnectDb/connect.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `creature` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $creature = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <form action="dashboard.php?page_layout=process-update-creature&id=<?php echo $creature['id'] ?>" method="POST">
            <div class="box">
                <h1>Cập nhật sinh vật</h1>
                <div class="row">
                    <p>Tên<b>(*)</b></p>
                    <input type="text" name="name" value="<?php echo $creature['name'] ?>">
                </div>

                <div class="row">
                    <p>Loài<b>(*)</b></p>
                    <input type="text" name="species" value="<?php echo $creature['species'] ?>">
                </div>

                <div class="row">
                    <p>Ảnh<b>(*)</b></p>
                    <input type="file" name="image">
                    <span class="current-image">Hiện tại: <?php echo basename($creature['image']); ?></span>
                </div>

                <div class="row">
                    <p>Mô tả<b>(*)</b></p>
                    <textarea name="description"><?php echo $creature['description'] ?></textarea>
                </div>

                <div class="row">
                    <p>Kích thước<b>(*)</b></p>
                    <input type="number" name="size" value="<?php echo $creature['size'] ?>">
                </div>

                <div class="row">
                    <p>Môi trường sống<b>(*)</b></p>
                    <input type="text" name="habitat" value="<?php echo $creature['habitat'] ?>">
                </div>

                <div class="row">
                    <p>Chế độ ăn<b>(*)</b></p>
                    <input type="text" name="diet" value="<?php echo $creature['diet'] ?>">
                </div>

                <div class="row">
                    <p>Trạng thái bảo tồn<b>(*)</b></p>
                    <select name="endangered_status">
                        <option value="Không bị đe dọa" <?php if ($creature['endangered_status'] == 'Không bị đe dọa') echo 'selected' ?>>Không bị đe dọa</option>
                        <option value="Bị đe dọa" <?php if ($creature['endangered_status'] == 'Bị đe dọa') echo 'selected' ?>>Bị đe dọa</option>
                        <option value="Gần như tuyệt chủng" <?php if ($creature['endangered_status'] == 'Gần như tuyệt chủng') echo 'selected' ?>>Gần như tuyệt chủng</option>
                    </select>
                </div>
                <div class="row" style="display: flex; justify-content: center;">
                    <input class="add" type="submit" value="Cập nhật">
                </div>
            </div>
        </form>
    </div>
</body>

</html>