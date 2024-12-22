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
    <h1>Thông tin đơn hàng</h1>
    <button class="btn-add">
            <a href="dashboard.php?page_layout=add-aquarium-area">
                <box-icon name='add-to-queue'></box-icon>
            </a>
            <p>Add</p>
        </button>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Email khách hàng</th>
            <th>Tổng giá</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
            <th>Tính năng</th>
        </tr>
        <?php 
            include('../ConnectDb/connect.php');  
            $sql = "SELECT * FROM `order` WHERE 1";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){   
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['customer_email']; ?></td>
            <td><?php echo $row['total_price']; ?></td>
            <td><?php echo $row['status']; ?></td>
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