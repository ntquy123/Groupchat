<?php
try {
    // Kết nối đến cơ sở dữ liệu
    $pdo = new PDO("mysql:host=localhost;dbname=u381817794_GroupChat", "u381817794_admin", "RqqtMFu_9ahC5_7");
    
    // Thiết lập chế độ báo lỗi và chế độ kiểm tra dữ liệu
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Kết nối thành công, hiển thị thông báo
   // echo "Kết nối đến cơ sở dữ liệu thành công.";
} catch (PDOException $e) {
    // Lỗi kết nối đến cơ sở dữ liệu, hiển thị thông báo lỗi
    die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
}
?>
