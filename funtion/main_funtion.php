<?php
function showData($query) {
    try {
        include("config/appsettings.php");
        // Chuẩn bị câu lệnh SQL
        $stmt = $pdo->prepare($query);
        
        // Thực hiện câu lệnh SQL
        $stmt->execute();
        
        // Trả về kết quả dưới dạng một mảng kết hợp
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Đóng kết nối
        $pdo = null;

        return $result;
    } catch (PDOException $e) {
        return false;
    }
}
?>
