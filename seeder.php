<?php

require_once 'vendor/autoload.php';

// Kết nối đến database
$host = 'localhost';
$dbname = 'Aquarium';
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

$imageLinks = [
    'https://i.pinimg.com/736x/15/d6/f8/15d6f8eda4d38c3a790092a1fa2f8b05.jpg',
    'https://i.pinimg.com/736x/34/be/41/34be413f6d5a18ca19ec7a239d64436f.jpg',
    'https://i.pinimg.com/736x/53/c6/8c/53c68c26ab02933a642d2c3d67eeb806.jpg',
    'https://i.pinimg.com/736x/65/cc/e7/65cce76aca08baf559aa2fac8b8381aa.jpg',
    'https://i.pinimg.com/736x/26/0a/90/260a90300a037eec71ea69b4a5279bee.jpg'
];

$pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");
$tables = ['Aquarium_Area', 'Ticket', 'Souvenir', 'Order', 'Order_Detail', 'Event', 'User', 'creature'];
foreach ($tables as $table) {
    $pdo->exec("TRUNCATE TABLE `$table`;");
}
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");

// Seeder cho bảng Aquarium_Area
for ($i = 0; $i < 6; $i++) {
    $name = $faker->words(3, true);
    $description = $faker->paragraph;
    $image = $imageLinks[array_rand($imageLinks)];

    $sql = "INSERT INTO Aquarium_Area (name, description, image) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $image]);
}

// Seeder cho bảng Ticket
for ($i = 0; $i < 6; $i++) {
    $type = $faker->randomElement(['Adult', 'Child']);
    $price = $faker->randomFloat(2, 10, 50);
    $description = $faker->sentence;

    $sql = "INSERT INTO Ticket (type, price, description) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$type, $price, $description]);
}

// Seeder cho bảng Souvenir
for ($i = 0; $i < 6; $i++) {
    $name = $faker->word;
    $description = $faker->sentence;
    $image = $imageLinks[array_rand($imageLinks)];
    $price = $faker->randomFloat(2, 5, 50);
    $stock = $faker->numberBetween(10, 100);

    $sql = "INSERT INTO Souvenir (name, description, image, price, stock) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $image, $price, $stock]);
}

// Seeder cho bảng Order
for ($i = 0; $i < 6; $i++) {
    $customerName = $faker->name;
    $customerEmail = $faker->email;
    $totalPrice = $faker->randomFloat(2, 50, 500);
    $status = $faker->randomElement(['Pending', 'Completed', 'Cancelled']);

    $sql = "INSERT INTO `Order` (customer_name, customer_email, total_price, status) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customerName, $customerEmail, $totalPrice, $status]);
}

// Seeder cho bảng Order_Detail
for ($i = 0; $i < 6; $i++) {
    $orderId = $faker->numberBetween(1, 6);
    $souvenirId = $faker->numberBetween(1, 6);
    $quantity = $faker->numberBetween(1, 5);
    $price = $faker->randomFloat(2, 5, 50);

    $sql = "INSERT INTO Order_Detail (order_id, souvenir_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$orderId, $souvenirId, $quantity, $price]);
}

// Seeder cho bảng Event
for ($i = 0; $i < 6; $i++) {
    $name = $faker->words(3, true);
    $description = $faker->paragraph;
    $startDate = $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d');
    $endDate = $faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d');
    $image = $imageLinks[array_rand($imageLinks)];

    $sql = "INSERT INTO `Event` (name, description, start_date, end_date, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $startDate, $endDate, $image]);
}

// Seeder cho bảng User
for ($i = 0; $i < 1; $i++) {
    $username = "ductri109";
    $email = $faker->email;
    $password = "ductri109@";
    $role = $faker->randomElement(['Admin', 'User']);

    $sql = "INSERT INTO `User` (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $password, $role]);
}

// Seeder cho bảng creature
for ($i = 0; $i < 6; $i++) {
    $name = $faker->word;
    $species = $faker->word;
    $description = $faker->paragraph;
    $image = $imageLinks[array_rand($imageLinks)];
    $size = $faker->randomFloat(2, 1, 100);
    $habitat = $faker->word;
    $diet = $faker->word;
    $endangeredStatus = $faker->randomElement(['Không bị đe dọa', 'Bị đe dọa', 'Gần như tuyệt chủng']);

    $sql = "INSERT INTO creature (name, image, species, description, size, habitat, diet, endangered_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $image, $species, $description, $size, $habitat, $diet, $endangeredStatus]);
}

echo "Dữ liệu mẫu đã được thêm vào database!";
