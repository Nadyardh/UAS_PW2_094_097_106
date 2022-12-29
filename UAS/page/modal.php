<?php 
include '../connection.php';
?>

<div class="content-wrapper">

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-body">

          <div class="table-responsive22">
            <table id="datatable" class="table table-bordered table-striped">
              <thead class="text-center">
                <tr>
                  <th>No.</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Penerbit</th>
                  <th>Pengarang</th>
                  <th>Tahun Terbit</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $no = 1;
                    $queryview = mysqli_query($conn, "SELECT * FROM tb_buku");
                    while ($row = mysqli_fetch_assoc($queryview)) {
                  ?>
                  <tr class="text-center">
                    <td><?php echo $no++;?></td>
                    <td><?php echo $row['judul'];?></td>
                    <td><?php echo $row['kategori'];?></td>
                    <td><?php echo $row['penerbit']; ?></td>
                    <td><?php echo $row['pengarang']; ?></td>
                    <td><?php echo $row['tahun_terbit']; ?></td>
                    <td>
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-bs-toggle="modal" data-bs-target="#updatebuku<?php echo $no; ?>"><i class="far fa-edit"></i> Edit</a>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-bs-toggle="modal" data-bs-target="#deletebuku<?php echo $no; ?>"><i class="fa fa-trash"></i> Delete</a>                      
                    </td>
                  </tr>
                  <!-- modal delete -->
                  <div class="example-modal">
                        <div id="deletebuku<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data buku</h3>
                                <button type="button" class="close btn text-danger btn-lg" data-bs-dismiss="modal" aria-bs-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                              </button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus buku dengan judul "<div class="text-uppercase uppercase"><?php echo $row['judul'];?><strong><span class="grt"></span></strong></div>" ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                <a href="aksi_hapus.php?act=deletebuku&id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update buku -->
                      <div class="example-modal">
                        <div id="updatebuku<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Edit Data buku</h3>
                              <button type="button" class="close btn text-danger btn-lg" data-bs-dismiss="modal" aria-bs-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                              </button>
                              </div>
                              <div class="modal-body">
                                <form action="aksi_update.php?act=updatebuku" method="post" role="form">
                                  <?php
                                  $id = $row['id'];
                                  $query = "SELECT * FROM tb_buku WHERE id='$id'";
                                  $result = mysqli_query($conn, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label text-right">Id User <span class="text-red">*</span></label>         
                                      <input type="text" class="form-control" name="id" placeholder="Id User" readonly value="<?php echo $row['id']; ?>">
                                    </div>
                                  <div class="form-group">
                                    <label for="name">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" value="<?php echo $row['judul']; ?>">            
                                  </div>    
                                  <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-select" name="kategori" aria-label="Default select example">
                                    <option selected ><?php echo $row['kategori']; ?></option>
                                      <option value="Biografi">Biografi</option>
                                      <option value="Ensiklopedia">Ensiklopedia</option>
                                      <option value="Komik">Komik</option>
                                      <option value="Manga">Manga</option>
                                      <option value="Novel">Novel</option>
                                  </select>     
                                  </div>
                                  <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit" value="<?php echo $row['penerbit']; ?>">            
                                  </div>
                                  <div class="form-group">
                                    <label for="pengarang">Pengarang</label>
                                    <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Pengarang" value="<?php echo $row['pengarang']; ?>">            
                                  </div>
                                  <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="date" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" value="<?php echo $row['tahun_terbit']; ?>">            
                                  </div>
                                  <div class="modal-footer">            
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-check"></i> Update</button>
                                  </div>
                                  <?php
                                  }
                                  ?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update buku -->
                  <?php
                    }
                  ?>
              </tbody>
            </table>
          </div> 
        </div>

        <!-- modal insert -->
        <div class="modal modal-create" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Form Data</h5>
        <button type="button" class="close btn text-danger btn-lg" data-bs-dismiss="modal" aria-bs-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="aksi_insert.php">
          <div class="form-group">
            <label for="name">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">            
          </div>    
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-select" name="kategori" aria-label="Default select example">
            <option selected disabled>-- Pilih Kategori --</option>
              <option value="Biografi">Biografi</option>
              <option value="Ensiklopedia">Ensiklopedia</option>
              <option value="Komik">Komik</option>
              <option value="Manga">Manga</option>
              <option value="Novel">Novel</option>
          </select>     
          </div>
          <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit">            
          </div>
          <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Pengarang">            
          </div>
          <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="date" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit">            
          </div>
          <div class="modal-footer">            
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

        <!-- modal insert close -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
</div>
