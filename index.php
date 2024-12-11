<?php 
$bien_con = mysqli_connect("localhost","root","","QLSV_PhamNgocAnh");
if($bien_con->connect_error){
    die("Kết nối thất bại: ".$bien_con->connect_error);
}
//truy vấn dữ liệu
if(isset($_GET["search"]) && !empty($_GET["search"])){
    $a = $_GET['search'];
    $sql = "SELECT * FROM table_Students WHERE (fullname LIKE '%$a%')OR (hometown LIKE '%$a%') ";
}else{
    $sql = "SELECT * FROM table_Students";
}
$result = mysqli_query($bien_con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif">DANH SÁCH SINH VIÊN</h1>
    <table class="search" >
        <tr>
            <td>
                <form action="" method="get">
                    <input type="text" name="search" placeholder="Nhập tên hoặc quê quán để tìm kiếm" value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>">

                    <input type="submit" value="Tìm">
                    <input type="button" value="Tất cả" onclick="window.location.href='index.php'">
                </form>
            </td>
        </tr>
    </table>
    <table class="danhsach">
        <tr>
            <th>Thứ tự</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Trình độ học vấn</th>
            <th>Nhóm</th>
            <th>Hành động</th>
        </tr>
        <tbody>
            <?php 
               if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $gender = $row['gender'] == 1 ? 'Nam' : 'Nữ';
                    $level = $row['level'];
                    if($level == 0){
                        $level = "Tiến sĩ";
                    }elseif($level == 1){
                        $level = "Thạc sĩ";
                    }elseif($level == 2){
                        $level = "Kỹ sư";
                    }elseif($level == 3){
                        $level = "Khác";
                    }
                    $id = $row['id'];
                    $fullname = $row['fullname'];
                    $dob = $row['dob'];
                    $hometown = $row['hometown'];
                    $group = $row['group'];
                    ?>
                    <tr>
                    <td><?php echo $id ?> </td>
                    <td><?php echo $fullname ?> </td>
                    <td><?php echo $dob ?> </td>
                    <td><?php echo $gender ?> </td>
                    <td><?php echo $hometown ?> </td>
                    <td><?php echo $level ?> </td>
                    <td><?php echo $group ?> </td>
                    <td>
                    <a href="edit.php?id=<?php echo $id ?> ">Sửa</a> | 
                    <a href="delete.php?id=<?php echo $id ?>"  onclick="return confirm ('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                    </td>
                    <?php
                }
               }
               ?>
               <?php 
               mysqli_close($bien_con);
               ?>
        </tbody>
    </table>
    <div class="add">
        <a href="add.php">Thêm sinh viên mới</a>
    </div>
</body>
</html>