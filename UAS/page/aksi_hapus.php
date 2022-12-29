<?php 
    include "../connection.php";    

    if($_GET['act']== 'deletebuku'){
        $id = $_GET['id'];
        $querydelete = mysqli_query($conn, "DELETE from tb_buku WHERE id='$id'");
    
        if ($querydelete) {
            # credirect ke page index
            header("location:index.php");    
        }
        else{
            echo "ERROR, data gagal diupdate". mysqli_error($conn);
        }
    }
    

?>

