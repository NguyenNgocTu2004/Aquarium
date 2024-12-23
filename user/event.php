<?php
include('ConnectDb/connect.php');
$sql = "SELECT * FROM `event` WHERE 1";
$result = mysqli_query($conn, $sql);
?>

<div class="main">
    <div class="ct">
        <div class="content-title">
            Events
        </div>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="img-event">
                <div>
                    <div class="ctev">
                        <img class="img-ct-1" src="<?php echo $row['image'];?>" alt="" />
                        <div class="content-event">
                            <h2><?php echo $row['name'];?></h2>
                            <div class="ctev-p">
                                <p><?php echo $row['description']; ?></p>
                            </div>
                            <p class="cms">Comingsoon | start: <?php echo $row['start_date']; ?> - end: <?php echo $row['end_date']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>