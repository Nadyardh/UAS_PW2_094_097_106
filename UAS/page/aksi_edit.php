<?php 
    include "../connection.php";
    $id = $_POST['id'];
    $sql = "SELECT * from tb_buku WHERE id=".$id."";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($query);
    echo json_encode($data);
?>