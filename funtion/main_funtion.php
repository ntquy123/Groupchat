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
function saveData($query, $data) {
    try {
        include("config/appsettings.php");
        
        // Chuẩn bị câu lệnh SQL
        $stmt = $pdo->prepare($query);
        
        // Gán giá trị cho các tham số trong câu lệnh SQL
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        
        // Thực hiện câu lệnh SQL
        $stmt->execute();
        
        // Trả về ID của bản ghi vừa thêm (nếu cần)
        $lastInsertId = $pdo->lastInsertId();
        
        // Đóng kết nối
        $pdo = null;

        return $lastInsertId;
    } catch (PDOException $e) {
        return false;
    }
}
function  CreateTransNo($table)
{
     include("config/appsettings.php");
    // Lấy ngày tháng năm hiện tại dưới định dạng "Ymd"
$currentDate = date("Ymd");

// Tạo mã transno ban đầu
$transno = $currentDate . "00001";

// Kiểm tra xem mã transno đã tồn tại trong cơ sở dữ liệu chưa
while (true) {
    $query = "SELECT Transaction FROM $table WHERE Transaction = :transno";
    $statement = $pdo->prepare($query);
    $statement->execute(['transno' => $transno]);
    $existingTransno = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$existingTransno) {
        // Nếu mã transno chưa tồn tại, dừng vòng lặp
        break;
    }

    // Nếu mã transno đã tồn tại, tăng giá trị số lên 1 và cập nhật mã transno
    $transno = (int)$transno + 1;
    $transno = str_pad($transno, 5, "0", STR_PAD_LEFT); // Đảm bảo có 5 chữ số
    return $transno;
}
}
?>
