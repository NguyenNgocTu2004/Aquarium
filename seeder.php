<?php

    require_once 'vendor/autoload.php';

    // Kết nối đến database
    $host = 'localhost'; 
    $dbname = 'aquarium';
    $username = 'root';
    $password = '';

    // Kết nối đến cơ sở dữ liệu MySQL
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    $faker = Faker\Factory::create();

    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");
    $deleteAllArea = "TRUNCATE TABLE `Aquarium_Area`";
    $truncateArea = $pdo->prepare($deleteAllArea);
    $truncateArea->execute();

    $deleteAllSou = "TRUNCATE TABLE `Souvenir`";
    $truncateSou = $pdo->prepare($deleteAllSou);
    $truncateSou->execute();

    $deleteAllEvent = "TRUNCATE TABLE `Event`";
    $truncateEvent = $pdo->prepare($deleteAllEvent);
    $truncateEvent->execute();

    $deleteAllUser = "TRUNCATE TABLE `User`";
    $truncateUser = $pdo->prepare($deleteAllUser);
    $truncateUser->execute();
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");

    // Seeder cho bảng Aquarium_Area
    for ($i = 0; $i < 6; $i++) {
        $name = $faker->words(3, true);
        $description = $faker->paragraph;
        $image = $faker->imageUrl;

        $sql = "INSERT INTO Aquarium_Area (name, description, image) VALUES (?, ?, ?)";    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $description, $image]);
    }
    // Seeder cho bảng Souvenir
    for ($i = 0; $i < 6; $i++) {
        $name = $faker->word;
        $description = $faker->sentence;
        $image = $faker->imageUrl;
        $price = $faker->randomFloat(2, 5, 50);  // Giá từ 5 đến 50
        $stock = $faker->numberBetween(10, 100);

        $sql = "INSERT INTO Souvenir (name, description, image, price, stock) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $description, $image, $price, $stock]);
    }

    // Seeder cho bảng Event
    for ($i = 0; $i < 6; $i++) {
        $name = $faker->words(3, true);
        $description = $faker->paragraph;
        $start_date = $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d');
        $end_date = $faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d');
        $image = $faker->imageUrl;
        $sql = "INSERT INTO `Event` (name, description, start_date, end_date, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $description, $start_date, $end_date, $image]);
    }

    // Seeder cho bảng User
    for ($i = 0; $i < 6; $i++) {
        $username = $faker->userName;
        $email = $faker->unique()->safeEmail;
        $password = $faker->password;
        $role = $faker->randomElement(['Admin', 'User']);
        
        $sql = "INSERT INTO `User` (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $password, $role]);
    }

    echo "Dữ liệu mẫu đã được thêm vào database!";

?>