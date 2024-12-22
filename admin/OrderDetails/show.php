<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
    <style>
        img {
            width: 100px;
        }

        .update {
            color: blue;

        }

        .delete {
            color: red;

        }
    </style>
</head>

<body>
    <?php
    // Số bản ghi hiển thị trên mỗi trang
    $limit = 5;

    // Số nút phân trang hiển thị
    $range = 5;

    // Lấy trang hiện tại từ URL (mặc định là 1)
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính toán offset cho SQL
    $start = ($page - 1) * $limit;

    // Truy vấn tổng số bản ghi
    $total_records_query = "SELECT COUNT(*) AS total FROM `order_detail`";
    $total_records_result = mysqli_query($conn, $total_records_query);
    $total_records = mysqli_fetch_assoc($total_records_result)['total'];

    // Tổng số trang
    $total_pages = ceil($total_records / $limit);

    // Tính phạm vi các trang hiển thị
    $start_page = max(1, $page - floor($range / 2));
    $end_page = min($total_pages, $page + floor($range / 2));

    // Điều chỉnh nếu không đủ số nút trong phạm vi
    if ($end_page - $start_page < $range - 1) {
        $start_page = max(1, $end_page - $range + 1);
    }
    ?>
    <div class="main">
        <h1>Chi tiết đơn hàng</h1>
        <div class="infor">

            <table border=1>
                <tr>
                    <th>ID</th>
                    <th>ID đơn hàng</th>
                    <th>ID quà lưu niệm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Ngày tạo</th>
                    <th>Ngày sửa</th>
                    <th>Tính năng</th>
                </tr>
                <?php
                include('../ConnectDb/connect.php');
                $sql = "SELECT * FROM `order_detail` LIMIT $start, $limit";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>

                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['order_detail_id ']; ?></td>
                        <td><?php echo $row['order_detail_id ']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['updated_at']; ?></td>

                        <td class="feature-box">
                            <button class="btn-feature">
                                <a href="dashboard.php?page_layout=update-aquarium-area&id=<?php echo $row['id']; ?>">
                                    <box-icon name='pencil'></box-icon>
                                </a>
                            </button>
                            <button class="btn-feature">
                                <a href="dashboard.php?page_layout=delete-aquarium-area&id=<?php echo $row['id']; ?>">
                                    <box-icon name='trash'></box-icon>
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>