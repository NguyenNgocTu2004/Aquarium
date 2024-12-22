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
   <h1>Thông tin sản phẩm</h1>
   <button class="btn-add">
            <a href="dashboard.php?page_layout=add-aquarium-area">
                <box-icon name='add-to-queue'></box-icon>
            </a>
            <p>Add</p>
        </button>
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