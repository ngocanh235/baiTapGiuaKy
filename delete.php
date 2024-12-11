<?php 
$bien_con = mysqli_connect("localhost","root","","QLSV_PhamNgocAnh");
if($bien_con->connect_error){
    die("Kết nối thất bại".$bien_con->connect_error);
}
//lấy id từ đường dẫn
$id = $_GET['id'];
//thực hiện xóa
$sql = "DELETE FROM `table_Students` WHERE `id` = $id";
if($bien_con->query($sql) === true){
    header("location: index.php");//quay lại trang web
}else{
    echo "Lỗi khi xóa".$bien_con->error;
    }
$bien_con->close();
?>
