<div class="main">
    <div class="main-ct">
        <div class="ct">
            <?php
                $sql = "SELECT * FROM `aquarium_area` WHERE id = '1'";
                $result = mysqli_query($conn, $sql); 
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="area-name"><?php echo $row['name']; ?></div>
            <div class="area-main">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="" class="area-img">
                <div class="area-description"><?php echo $row['description']; ?></div>
            </div>
        </div>
        <div class="ct">
        <div id="creatureCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1200x400.png?text=Cá+Hổ" class="d-block w-100" alt="Cá Vàng">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cá Vàng</h5>
                    <p>Cá cảnh đẹp và dễ nuôi trong bể cá nước ngọt.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1200x400.png?text=Cá+Hổ" class="d-block w-100" alt="Cá Hổ">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cá Hổ</h5>
                    <p>Cá cảnh có sọc, thích hợp cho bể cá nước ngọt.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1200x400.png?text=Cá+Hổ" class="d-block w-100" alt="Cá Chép">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cá Chép</h5>
                    <p>Cá cảnh phổ biến, thích hợp cho bể cá lớn.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#creatureCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#creatureCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
        </div>
    </div>
</div>