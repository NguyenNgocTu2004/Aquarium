<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row {
            margin-top: 20px;
        }

        b {
            color: red;
        }

        form {
            margin: 20px auto;
            width: 400px;
            background-color: antiquewhite;
            display: flex;
            justify-content: center;
        }

        .add {
            margin-bottom: 20px;
            alig-item: center;
            padding: 10px 20px;
            color: white;
            background-color: green;
        }
    </style>
</head>

<body>
    <?php
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
        VALUES ('$name','$species', '../img/$image','$description', '$size','$habitat',' $diet','$endangered_status')";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=creature');
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
    <form action="dashboard.php?page_layout=add-creature" class="" method="POST">
        <div class="box">

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
                <p>trạng thái bảo tồn<b>(*)</b></p>
                <select required name="endangered_status">
                    <option value="Không bị đe dọa">Không bị đe dọa</option>
                    <option value="Bị đe dọa">Bị đe dọa</option>
                    <option value="Gần như tuyệt chủng">Gần như tuyệt chủng</option>
                </select>
            </div>

            <div class="row" style="display: flex; justify-content: center;"></div>
            <div class="row" style="display: flex; justify-content: center;">
                <input class="add" type="submit" value="Thêm">
            </div>
        </div>
    </form>
    <!-- <script>
        // Lấy input element
        const dateInput = document.getElementById('create-date');

        // Tạo thời gian hiện tại theo định dạng YYYY-MM-DD
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0'); // Tháng bắt đầu từ 0
        const dd = String(today.getDate()).padStart(2, '0');

        // Gán giá trị cho input
        dateInput.value = `${yyyy}-${mm}-${dd}`;
    </script>    -->
</body>

</html>