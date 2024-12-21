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
    <h1>Thông tin sự kiện</h1>
    <a href="dashboard.php?page_layout=add-creature">them</a>
    <table border=1>
        <tr>
        
            <th>ID</th>
            <th>Tên</th>
            <th>Loài</th>
            <th>Mô tả</th>
            <th>Kích thước</th>
            <th>Môi trường sống</th>
            <th>Chế độ ăn</th>
            <th>Trạng thái bảo tồn</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Tính năng</th>
        </tr>
        <?php 
            include('../ConnectDb/connect.php');  
            $sql = "SELECT * FROM `creature` WHERE 1";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){   
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['species']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['size']; ?></td>
            <td><?php echo $row['habitat']; ?></td>
            <td><?php echo $row['diet']; ?></td>
            <td><?php echo $row['endangered_status']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            <td>
                <a class="update" href="dashboard.php?page_layout=update-creature&id=<?php echo $row['id']; ?>">Cập nhật</a>
                <a class="delete" href="dashboard.php?page_layout=delete-creature&id=<?php echo $row['id']; ?>">Xoá</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>