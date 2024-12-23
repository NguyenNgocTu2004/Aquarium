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
        .row input[type="file"],
        .row input[type="number"],
        .row textarea,
        .row select {
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        !empty($_POST['name']) &&
        !empty($_POST['species']) &&
        !empty($_POST['image']) &&
        !empty($_POST['description']) &&
        !empty($_POST['size']) &&
        !empty($_POST['habitat']) &&
        !empty($_POST['diet']) &&
        !empty($_POST['endangered_status'])
    ) {

        $name = $_POST['name'];
        $species = $_POST['species'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $size = $_POST['size'];
        $habitat = $_POST['habitat'];
        $diet = $_POST['diet'];
        $endangered_status = $_POST['endangered_status'];

        include('../ConnectDb/connect.php');
        $sql = "INSERT INTO `creature`(`name`, `species`, `image`, `description`, `size`, `habitat`, `diet`, `endangered_status`) 
        VALUES ('$name','$species', '../img/$image','$description', '$size','$habitat','$diet','$endangered_status')";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=creature');
    } else {
        $error_message = "Vui lòng nhập đầy đủ thông tin!";
    }}
    ?>
    <div class="container">
        <form action="dashboard.php?page_layout=add-creature" method="POST">
            <h1>Thêm Sinh Vật</h1>
            <div class="row">
                <p>Tên<b>(*)</b></p>
                <input type="text" name="name">
            </div>
            <div class="row">
                <p>Loài<b>(*)</b></p>
                <input type="text" name="species">
            </div>
            <div class="row">
                <p>Ảnh<b>(*)</b></p>
                <input type="file" name="image">
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <textarea name="description"></textarea>
            </div>
            <div class="row">
                <p>Kích thước<b>(*)</b></p>
                <input type="number" name="size">
            </div>
            <div class="row">
                <p>Môi trường sống<b>(*)</b></p>
                <input type="text" name="habitat">
            </div>
            <div class="row">
                <p>Chế độ ăn<b>(*)</b></p>
                <input type="text" name="diet">
            </div>
            <div class="row">
                <p>Trạng thái bảo tồn<b>(*)</b></p>
                <select required name="endangered_status">
                    <option value="Không bị đe dọa">Không bị đe dọa</option>
                    <option value="Bị đe dọa">Bị đe dọa</option>
                    <option value="Gần như tuyệt chủng">Gần như tuyệt chủng</option>
                </select>
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