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
    <h1>Thông tin vé</h1>
    <a href="dashboard.php?page_layout=add-ticket">them</a>
    <table border=1>
        <tr>
            <th>Mã vé</th>
            <th>Hạng vé</th>
            <th>Giá vé</th>
            <th>Mô tả</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
        </tr>
        <?php 
            include('../ConnectDb/connect.php');  
            $sql = "SELECT * FROM `ticket` WHERE 1";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){   
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            
            <td>
                <a class="update" href="dashboard.php?page_layout=update-ticket&id=<?php echo $row['id']; ?>">Cập nhật</a>
                <a class="delete" href="dashboard.php?page_layout=delete-ticket&id=<?php echo $row['id']; ?>">Xoá</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>