<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $Transaction = CreateTransNo("Group_Master");
    $groupName = $_POST["namegroup"];
    $groupLink = $_POST["linkgroup"];
    $typegroup = $_POST["typegroup"];
    $taggroup =  $_POST["taggroup"];
    $description = $_POST["description"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $groupLink);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if (!$httpCode == 200) {
        echo "Liên kết Discord không thể truy cập hoặc không hợp lệ.";
        return false;
    }
    // Lấy thông tin về tệp hình ảnh được tải lên
    $image1 = $_FILES["fileToUpload"];
    $image2 = $_FILES["fileToUpload2"];

    // Xác định thư mục để lưu trữ hình ảnh
    $targetDirectory = "../uploads/image_group"; // Thay đổi thành đường dẫn thư mục tương ứng

    // Kiểm tra kích thước tệp hình ảnh (kiểm tra xem nó không vượt quá 1MB)
    if (($image1["size"] <= 1024 * 1024 || $image2["size"] <= 1024 * 1024)) {
        // Hình ảnh có kích thước hợp lệ hoặc không được tải lên

        // Tạo tên tệp hình ảnh độc đáo bằng sử dụng timestamp
        $image1Name = "/images/defaut_group.jpg";
        $image2Name = "";

        if ($image1["size"] > 0) {
            $image1Name = $targetDirectory . time() . "_" . $image1["name"];
            move_uploaded_file($image1["tmp_name"], $image1Name);
        }

        if ($image2["size"] > 0) {
            $image2Name = $targetDirectory . time() . "_" . $image2["name"];
            move_uploaded_file($image2["tmp_name"], $image2Name);
        }

        // Chuẩn bị dữ liệu để lưu vào cơ sở dữ liệu
        $data = [
            'transaction' => $Transaction,
            'namegroup' => $groupName,
            'linkgroup' => $groupLink,
            'typegroup' => $typegroup,
            'taggroup' => $taggroup,
            'description' => $description,
            'image1' => $image1Name,
            'image2' => $image2Name
            // Các trường dữ liệu khác nếu cần
        ];

        // Chuẩn bị câu lệnh SQL INSERT
        $query = "INSERT INTO Group_Master (Transaction, Name, Link, Image1, Image2, Type, Tag, View, Status, Description, Creator, Create_Date) VALUES ( :transaction, :namegroup, :linkgroup, :image1, :image2, :typegroup, :taggroup, 0, 1, :description, 1, NOW())";

        // Gọi hàm saveData để lưu dữ liệu vào cơ sở dữ liệu
        $lastInsertId = saveData($query, $data);

        if ($lastInsertId !== false) {
            echo "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
        } else {
            echo "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu.";
        }
    } else {
        // Kích thước của hình ảnh vượt quá 1MB hoặc không có hình ảnh
        echo "Kích thước hình ảnh quá lớn (hơn 1MB) hoặc không có hình ảnh nào được tải lên.";
    }
}


function createTransNo($table) {
    include("../config/appsettings.php");

    // Lấy ngày tháng năm hiện tại dưới định dạng "Ymd"
    $currentDate = date("Ymd");

    // Tạo mã transno ban đầu
    $transno = $currentDate . "00001";

    while (true) {
        // Kiểm tra xem mã transno đã tồn tại trong cơ sở dữ liệu
        $query = "SELECT MAX(Transaction) AS maxTransno FROM $table WHERE Transaction LIKE :prefix";
        $prefix = $transno . '%';
        $statement = $pdo->prepare($query);
        $statement->execute(['prefix' => $prefix]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result['maxTransno'] === null) {
            // Nếu không có mã transno nào tồn tại, trả về giá trị và dừng vòng lặp
            return $transno;
        }

        // Nếu có mã transno tồn tại, tìm mã transno lớn nhất và tăng giá trị lên 1
        $maxTransno = (int)$result['maxTransno'];
        $transno = (string)($maxTransno + 1);
    }
}

function saveData($query, $data) {
    try {
        include("../config/appsettings.php");
        
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
?>