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
    <div class="main">
    <h1>Thông tin người dùng</h1>
    <button class="btn-add">
            <a href="dashboard.php?page_layout=add-aquarium-area">
                <box-icon name='add-to-queue'></box-icon>
            </a>
            <p>Add</p>
        </button>
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
            
            <td class="feature-box">
                    <button class="btn-feature" >
                        <a href="dashboard.php?page_layout=update-aquarium-area&id=<?php echo $row['id']; ?>">
                            <box-icon name='pencil'></box-icon>
                        </a>
                    </button>
                    <button class="btn-feature">
                        <a href="dashboard.php?page_layout=delete-aquarium-area&id=<?php echo $row['id']; ?>">
                            <box-icon name='trash' ></box-icon>
                        </a>
                    </button>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>