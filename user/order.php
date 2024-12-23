<div class="main">
    <div class="ct">
        <div class="title">
            <div class="title-left">
                <p class="p1">TOP PICKS</p>
                <p class="p2">Our Most Popular Products</p>
                <p class="p3">Check out our top picks and see why these popular
                    products are customer favorites. Experience the quality
                    and performance that makes them stand out.
                </p>
            </div>
        </div>
        <div class="shop">
            <div class="shop-items">
                <div class="colums">
                    <?php
                    include('ConnectDb/connect.php');
                    $sql = "SELECT * FROM `souvenir` where 1";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="item">
                            <img class="image" src="<?php echo $row['image'];?>" alt="">
                            <p><?php echo $row['name']; ?></p>
                            <div class="price">
                                <p>$<?php echo $row['price']; ?></p>
                                <button>Buy now</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Giỏ hàng thông báo -->
<div class="cart-info">
    <span id="cart-count">Cart: 0 items</span>
</div>


