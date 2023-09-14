<?php
  include('templates/header.php');
  include('templates/sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Edit Kedatangan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kedatangan where id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
           <!--  <div class="form-group">
              <label>Pilih Penduduk</label>
              <select class="form-control  col-sm-4 select2" name="NIK" disabled="">
                <option value="">Pilih Penduduk</option>
                <?php
                  $datas = mysqli_query($koneksi, "select * from data_kependudukan") or die(mysqli_error($koneksi));
                  while($dt = mysqli_fetch_assoc($datas)) {
                ?> 
                <option value="<?= $dt['NIK']; ?>" <?php echo ($dt['NIK'] == $row['NIK']) ? 'selected' : ''; ?>><?= $dt['Nama'] ?></option>
              <?php } ?>
              </select>
            </div> -->
             <div class="form-group">
              <label>NIK</label>
              <input type="text" name="NIK" required="" class="form-control col-sm-4" value="<?= $row['NIK']; ?>" >
            </div> 
             <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" required="" class="form-control col-sm-4" value="<?= $row['nama']; ?>" >
            </div> 
            <div class="form-group">
              <label>Agama</label>
              <select class="form-control  col-sm-4" name="agama"  required="">
                <option value="">Pilih</option>
                <option value="Islam" <?php echo ($row['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="Protestan" <?php echo ($row['agama'] == 'Protestan') ? 'selected' : ''; ?>>Protestan</option>
                <option value="Katholik" <?php echo ($row['agama'] == 'Katholik') ? 'selected' : ''; ?>>Katholik</option>
                <option value="Hindu" <?php echo ($row['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                <option value="Buddha" <?php echo ($row['agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
              </select>
            </div> 
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="pekerjaan"  class="form-control col-sm-4" required=""  value="<?= $row['pekerjaan']; ?>">
            </div>
            <div class="form-group">
              <label>No Surat</label>
              <input type="text" name="No_Surat"  class="form-control"   value="<?= $row['No_Surat']; ?>"  required="">
            </div>
            
            <div class="form-group">
              <label>Alamat Asal</label>
              <input type="text" name="Alamat_Asal"  class="form-control"  required="" value="<?= $row['Alamat_Asal']; ?>">
            </div>
            
            <div class="form-group">
              <label>Alamat Sekarang</label>
              <input type="text" name="Alamat_Sekarang"  class="form-control"  required="" value="<?= $row['Alamat_Sekarang']; ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Kedatangan</label>
              <input type="date" name="Tanggal_Kedatangan"  class="form-control col-sm-2"  required="" value="<?= $row['Tanggal_Kedatangan']; ?>">
            </div>
            
            <div class="form-group">
              <label>Foto Surat Pengantar (abaikan jika tidak ganti foto) - <a target="_blank" href="assets/gambar/<?= $row['Foto_Surat_Pengantar']; ?>">Foto sebelumnya</a></label>
              <input type="file" name="Foto_Surat_Pengantar"  class="form-control col-sm-4" >
            </div>
            <?php if($_SESSION['hak_akses'] == 'admin') { ?>
            <div class="form-group">
              <label>Status Validasi</label>
              <select class="form-control  col-sm-4 select2" name="status_data" required="">
                <option value="">Pilih</option>
                <option value="Diajukan" <?php echo ($row['status_data'] == 'Diajukan') ? 'selected' : ''; ?> >Diajukan</option>
                <option value="Proses" <?php echo ($row['status_data'] == 'Proses') ? 'selected' : ''; ?> >Proses</option>
                <option value="Selesai" <?php echo ($row['status_data'] == 'Selesai') ? 'selected' : ''; ?> >Selesai</option>
              </select>
            </div>
             <?php } else { ?>
                <input type="hidden" name="status_data"  value="<?= $row['status_data']; ?>">
             <?php }  ?>

            <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
          </form>
      </div>
    </div>
        <!-- /.card-body -->
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
        
        //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['submit'])) {
         
          //menampung data dari inputan
          $id = $_POST['id'];
          $NIK = $_POST['NIK'];
          $nama = $_POST['nama'];
          $agama = $_POST['agama'];
          $pekerjaan = $_POST['pekerjaan'];
          $No_Surat = $_POST['No_Surat'];
          $Alamat_Asal = $_POST['Alamat_Asal'];
          $Alamat_Sekarang = $_POST['Alamat_Sekarang'];
          $Tanggal_Kedatangan = $_POST['Tanggal_Kedatangan'];
          $status_data = $_POST['status_data'];

          $nama_gambar1   = $_FILES['Foto_Surat_Pengantar']['name'];
          $file_tmp1    = $_FILES['Foto_Surat_Pengantar']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = $row['Foto_Surat_Pengantar'];
          }
          $Foto_Surat_Pengantar = $nama_unik1;

      $datas = mysqli_query($koneksi, "update data_kedatangan set status_data ='$status_data',NIK ='$NIK',nama ='$nama',agama ='$agama',Pekerjaan ='$Pekerjaan',No_Surat ='$No_Surat',Alamat_Asal ='$Alamat_Asal',Alamat_Sekarang ='$Alamat_Sekarang',Tanggal_Kedatangan = '$Tanggal_Kedatangan', Foto_Surat_Pengantar = '$Foto_Surat_Pengantar' where id = '$id'") or die(mysqli_error($koneksi));
      echo "<script>alert('data berhasil diubah.');window.location='kedatangan-index.php';</script>";
  }
  ?>
  <?php
    include('templates/footer.php');
  ?>

