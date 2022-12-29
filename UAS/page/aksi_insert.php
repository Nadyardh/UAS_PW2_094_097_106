<?php 
    include "../connection.php";    
    $sql = "INSERT INTO tb_buku(judul,
                            kategori,
                            penerbit,
                            pengarang,
                            tahun_terbit)
            VALUES ('$_POST[judul]',
                    '$_POST[kategori]',
                    '$_POST[penerbit]',
                    '$_POST[pengarang]',
                    '$_POST[tahun_terbit]')";
    $query = mysqli_query($conn,$sql);
    header("location:index.php");
?>