<?php
include 'autoload/autoload.php';
include 'header.php';
$id = intval(getInput('id'));
//lấy tất cả dữ liệu trong bảng thông qua id
$input = $db->fetchID("page", $id);
//chọn tên và id từ bảng với điều kiện page_id=$id
$sqlhomecate = "SELECT name, id FROM category WHERE page_id=$id";
//Lấy tất cả dữ liệu có trong bảng qua câu lệnh 
$Categoryhome = $db->fetchsql($sqlhomecate);

$data = [];
foreach ($Categoryhome as $item) {
    $idcate = intval($item['id']);
    $sql = "SELECT * FROM product WHERE category_id = $idcate";
    $productHome = $db->fetchsql($sql);
    $data[$item['name']] = $productHome;
}
?>




<?php include 'footer.php'; ?>