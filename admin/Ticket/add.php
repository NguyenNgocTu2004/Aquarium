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
        !empty($_POST['name-ticket']) &&
        !empty($_POST['description'])
    ) {
        $price = $_POST['price'];
        $nameTicket = $_POST['name-ticket'];
        $description = $_POST['description'];
        include('../ConnectDb/connect.php');
        $sql = "INSERT INTO `ticket`(`price`,`type`, `description`) VALUES ('$price','$nameTicket','$description')";
        mysqli_query($conn, $sql);
        header('location:dashboard.php?page_layout=ticket');
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
    ?>
    <form action="dashboard.php?page_layout=add-ticket" class="" method="POST">
        <div class="box">
            <h1>Thêm vé tham quan</h1>
            <div class="row">
                <p>Giá vé<b>(*)</b></p>
                <input type="text" name="price">
            </div>
            <div class="row">
                <p>Hạng vé<b>(*)</b></p>
                <input type="text" name="name-ticket">
            </div>
            <div class="row">
                <p>Mô tả<b>(*)</b></p>
                <textarea name="description"></textarea>
            </div>
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