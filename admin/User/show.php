<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
</head>

<body>
    <?php



    ?>

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
    $total_records_query = "SELECT COUNT(*) AS total FROM `user`";
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
        <h1>Thông tin người dùng</h1>
        <div class="infor">
            <div class="feature">
                <button class="btn-add" onclick="window.location.href='dashboard.php?page_layout=add-user'">
                    <i class='bx bx-add-to-queue size-btn' style='color:#ffffff'></i>
                    <p>Add</p>
                </button>
                <form id="searchForm" action="dashboard.php" method="GET">
                    <!-- Thêm tham số page_layout vào form -->
                    <input type="hidden" name="page_layout" value="search-user">
                    <input type="text" name="search-username">
                    <input type="email" name="search-email">
                    <input type="submit" value="search">
                </form>
                <script>
                    document.getElementById('searchForm').addEventListener('submit', function(event) {
                        var searchByUser = document.querySelector('input[name="search-username"]').value;
                        var searchByEmail = document.querySelector('input[name="search-email"]').value;

                        // Thêm các tham số search-username và search-email vào URL nếu chúng có giá trị
                        if (searchByUser && searchByEmail) {
                            // Form đã có sẵn action là dashboard.php, không cần thay đổi
                            this.action = "dashboard.php?page_layout=search-user&search-username=" + encodeURIComponent(searchByUser) + "&search-email=" + encodeURIComponent(searchByEmail);
                        }
                    });
                </script>
            </div>

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
                $sql = "SELECT * FROM `user` LIMIT $start, $limit";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
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
                            <button class="btn-feature update" onclick="location.href='dashboard.php?page_layout=update-user&id=<?php echo $row['id']; ?>'">
                                <i class='bx bx-pencil size-btn' style='color:#ffffff'></i>
                            </button>
                            <button class="btn-feature delete" onclick="confirmDelete(event, '<?php echo "dashboard.php?page_layout=delete-user&id=" . $row['id']; ?>')">
                                <i class='bx bx-trash size-btn' style='color:#ffffff'></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="pagination">
                <!-- Nút "Trang đầu" -->
                <?php if ($page > 1): ?>
                    <a href="dashboard.php?page_layout=user&page=1">«--</a>
                    <a href="dashboard.php?page_layout=user&page=<?php echo $page - 1; ?>">«</a>
                <?php endif; ?>

                <!-- Hiển thị các nút trong phạm vi -->
                <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                    <a href="dashboard.php?page_layout=user&page=<?php echo $i; ?>"
                        style="margin: 0 5px; <?php echo ($i == $page) ? 'font-weight: bold;' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <!-- Nút "Trang cuối" -->
                <?php if ($page < $total_pages): ?>
                    <a href="dashboard.php?page_layout=user&page=<?php echo $page + 1; ?>">»</a>
                    <a href="dashboard.php?page_layout=user&page=<?php echo $total_pages; ?>">--»</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(event, deleteUrl) {
            event.preventDefault();
            if (confirm("Bạn có chắc chắn muốn xóa?")) {
                window.location.href = deleteUrl;
            }
        }
    </script>

</body>

</html>