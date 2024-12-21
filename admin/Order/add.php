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
    if(!empty($_POST['name']) &&
    !empty($_POST['email']) &&
    !empty($_POST['total_price']) &&  
    !empty($_POST['status'])){
        
        $customer_name= $_POST['name'];
        $customer_email = $_POST['email'];
        $total_price = $_POST['total_price'];
        $status = $_POST['status'];

        include('../ConnectDb/connect.php');
        $sql = "INSERT INTO `order`(`customer_name`, `customer_email`, `total_price`, `status`)
         VALUES ('$customer_name',' $customer_email','$total_price','$status')";
        mysqli_query($conn,$sql);
        header('location:dashboard.php?page_layout=order');
    }
    else{
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
?>
    <form action="dashboard.php?page_layout=add-order" class="" method="POST">
        <div class="box">
            <h1>Thêm oder</h1>

            <div class="row">
                <p>Tên khách hàng<b>(*)</b></p>
                <input type="text" name="name">
            </div>

            <div class="row">
                <p>Email khách hàng<b>(*)</b></p>
                <input type="email" name="email">
            </div>

            <div class="row">
                <p>Tổng giá<b>(*)</b></p>
                <input type="number" name="total_price">
            </div>

            <div class="row">
                <p>Trạng thái:<b>(*)</b></p>
                <select required name= "status">
                   <option value="Pending">Pending</option>
                   <option value="Completed">Completed</option>
                   <option value="Cancelled">Cancelled</option>
                </select>
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