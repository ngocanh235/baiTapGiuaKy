<?php
// Kết nối cơ sở dữ liệu
$bien_con = mysqli_connect("localhost", "root", "", "QLSV_PhamNgocAnh");

if ($bien_con->connect_error) {
    die("Kết nối thất bại: " . $bien_con->connect_error);
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM table_Students WHERE id = '$id' ";
    $result = $bien_con->query($sql);
    if($result -> num_rows >0){
        $row = $result -> fetch_assoc();
    }else{
        echo"Không tìm thấy sinh viên";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
         <h1>Chỉnh sửa thông tin sinh viên</h1>
    <div class="edit">
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Họ và tên:</label>
            <input type="text" name="fullname" required><br>
            <label>Ngày sinh: </label>
            <input type="date" name="dob"required><br>
            <label>Giới tính:</label>
            <input type="radio" name="gender" value="0"required>Nữ
            <input type="radio" name="gender" value="1"required>Nam<br>
            <label>Quê quán:</label>
            <input type="text" name="hometown" required><br>
            <label>Trình độ học vấn: </label>
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $level = $_POST['level'];
    $group = $_POST['group'];

    // Cập nhật thông tin sinh viên vào cơ sở dữ liệu
    $sql = "UPDATE table_Students 
            SET fullname = '$fullname', 
                dob = '$dob', 
                gender = '$gender', 
                hometown = '$hometown', 
                level = '$level', 
                `group` = '$group' 
            WHERE id = '$id'";

    
if ($bien_con->query($sql) === TRUE) {
    header("location:index.php");
} else {
    echo "Lỗi: " . $sql . "<br>" . $bien_con->error;
}
}

$bien_con->close();
?>

