<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <h1>THÊM THÔNG TIN CỦA SINH VIÊN MỚI</h1>

    <div class="them">
        <form action="add.php" method="post">
            <label>Họ và tên:</label>
            <input type="text" name="fullname" required><br>
            <label>Ngày sinh:</label>
            <input type="date" name="dob" required><br>
            <label>Giới tính:</label>
            <input type="radio" name="gender" value="0" required> Nữ
            <input type="radio" name="gender" value="1" required> Nam <br>
            <label>Quê quán:</label>
            <input type="text" name="hometown" required><br>
            <label>Trình độ học vấn:</label>
            <select name="level">
                <option value="0">Tiến sĩ</option>
                <option value="1">Thạc sĩ</option>
                <option value="2">Kỹ sư</option>
                <option value="3">Khác</option>
            </select><br>
            <label>Nhóm:</label>
            <input type="number" name="group" required><br>
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>
<?php
// Kết nối đến cơ sở dữ liệu
$bien_con = mysqli_connect("localhost", "root", "", "QLSV_PhamNgocAnh");

// Kiểm tra kết nối
if ($bien_con->connect_error) {
    die("Kết nối thất bại: " . $bien_con->connect_error);
}

// Lấy dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $level = $_POST['level'];
    $group = $_POST['group'];

    // Câu lệnh SQL để thêm mới sinh viên
    $sql = "INSERT INTO table_Students (fullname, dob, gender, hometown, level, `group`) 
            VALUES ('$fullname', '$dob', '$gender', '$hometown', '$level', '$group')";

    // Thực thi truy vấn
    if ($bien_con->query($sql) === TRUE) {
        header("location:index.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $bien_con->error;
    }
}

// Đóng kết nối
$bien_con->close();
?>
