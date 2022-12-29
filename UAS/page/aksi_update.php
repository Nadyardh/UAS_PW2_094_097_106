<?php 
    include "../connection.php";    

    if($_GET['act']== 'updatebuku'){
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $kategori = $_POST['kategori'];
        $penerbit = $_POST['penerbit'];
        $pengarang = $_POST['pengarang'];
        $tahun_terbit = $_POST['tahun_terbit'];
    
        //query update
        $queryupdate = mysqli_query($conn, "UPDATE tb_buku SET judul='$judul', kategori='$kategori' , penerbit='$penerbit' , pengarang='$pengarang',tahun_terbit='$tahun_terbit' WHERE id='$id' ");
    
        if ($queryupdate) {
            # credirect ke page index
            header("location:index.php");    
        }
        else{
            echo "ERROR, data gagal diupdate". mysqli_error($conn);
        }
    }

?>