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
    <h1>Thông tin người dùng</h1>
    <a href="dashboard.php?page_layout=add-user">them</a>
    <table border=1>
        <tr>
            <th>id</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Password</th>
            <th>quyền</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
            <th>Tính năng</th>
        </tr>
        <?php 
            include('../ConnectDb/connect.php');  
            $sql = "SELECT * FROM `user` WHERE 1";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){   
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            
            <td>
                <a class="update" href="dashboard.php?page_layout=update-user&id=<?php echo $row['id']; ?>">Cập nhật</a>
                <a class="delete" href="dashboard.php?page_layout=delete-user&id=<?php echo $row['id']; ?>">Xoá</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>