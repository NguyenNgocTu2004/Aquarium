<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
    <style>
        img{
            width: 100px;
        }

        .update{
            color: blue;
            
        }

        .delete{
             color: red;

        }
    </style>
</head>
<body>
    <h1>Thông tin sản phẩm</h1>
    <a href="dashboard.php?page_layout=add-souvenir">them</a>
    <table border=1>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng còn lại</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
            <th> Tính năng</th>
        </tr>
        <?php 
            include('../ConnectDb/connect.php');  
            $sql = "SELECT * FROM `souvenir` WHERE 1";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){   
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><img src="avatar/images.jpg" alt=""></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            
            <td>
                <a class="update" href="dashboard.php?page_layout=update-souvenir&id=<?php echo $row['id']; ?>">Cập nhật</a>
                <a class="delete" href="dashboard.php?page_layout=delete-souvenir&id=<?php echo $row['id']; ?>">Xoá</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>