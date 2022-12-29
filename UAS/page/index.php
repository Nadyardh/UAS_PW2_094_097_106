<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
include '../connection.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">
    <title>E-Perpus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/css/animate.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-lg-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">E-Perpus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="container-fluid">
      <div class="row">        
        <main role="main" class="col-md-9 mx-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2 class="h2">Data Buku</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
              <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target=".modal-create"><i class="fas fa-plus"></i> Tambah Data</button>
            </div>
          </div>
          <?php 
                //panggil form modals bootstrap
              include "modal.php";                    
              ?>    
        </main>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function () {
        //ajax edit data pegawai
        $(".edit").off("click").on("click",function() {              
           var id_data = $(this).attr("data-id");
           $.ajax({                        
                url : "aksi_edit.php?id="+id_data,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {                                    
                    $("#id").val(data.id);                     
                    $("#judul").val(data.judul);                     
                    $("#kategori").val(data.kategori);                     
                    $("#penerbit").val(data.penerbit);                     
                    $("#pengarang").val(data.pengarang);                     
                    $("#tahun_terbit").val(data.tahun_terbit);                     
                    $(".modal-update").modal('show');                             
                }
            });    
        });
        
        //ajax hapus data pegawai
        $(".hapus").off("click").on("click",function(){
            var id_data = $(this).attr("data-id");
            $.ajax({
                url : "aksi_hapus.php?id="+id_data,
                type : "POST",
                success : function(data){
                    window.location = "index.php";
                }
            });
        });
        
    });
    </script>
  </body>
</html>