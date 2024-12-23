<div class="main">
    <div class="ct">
        <div id="creatureCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                include('ConnectDb/connect.php');
                $sql = "SELECT * FROM `creature` WHERE 1";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="carousel-item active">
                        <img src="<?php echo $row['image'];?>" class="d-block w-100" alt="<?php echo $row['name']; ?>">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $row['name']; ?></h5>
                            <p>
                                <?php echo $row['description']; ?><br>
                                trạng thái:<?php echo $row['endangered_status']; ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
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