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
            <h1>Halaman Edit Kematian</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kematian where id = '$id'");
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
            <div class="form-group">
              <label>NIK</label>
              <input type="text" name="NIK"  class="form-control"  required="" value="<?= $row['NIK']; ?>">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama"  class="form-control"  required="" value="<?= $row['nama']; ?>">
            </div>
            
            
            <div class="form-group">
              <label>Hari Meninggal</label>
              <select class="form-control  col-sm-4" name="Hari_Meninggal"  required="">
                <option value="">Pilih Hari</option>
                <option value="Senin" <?php echo ($row['Hari_Meninggal'] == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                <option value="Selasa" <?php echo ($row['Hari_Meninggal'] == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                <option value="Rabu" <?php echo ($row['Hari_Meninggal'] == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                <option value="Kamis" <?php echo ($row['Hari_Meninggal'] == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                <option value="Jumat" <?php echo ($row['Hari_Meninggal'] == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                <option value="Sabtu" <?php echo ($row['Hari_Meninggal'] == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                <option value="Minggu" <?php echo ($row['Hari_Meninggal'] == 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Meninggal</label>
              <input type="text" name="Tempat"  class="form-control"  required="" value="<?= $row['Tempat']; ?>">
            </div>
            <div class="form-group">
              <label>Tanggal </label>
              <input type="date" name="Tgl_Meninggal"  class="form-control col-sm-2"  required="" value="<?= $row['Tgl_Meninggal']; ?>">
            </div>
            
            <div class="form-group">
              <label>Umur</label>
              <input type="text" name="Umur"  class="form-control col-sm-2"  required="" value="<?= $row['Umur']; ?>">
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
         $status_data = $_POST['status_data'];

          //menampung data dari inputan
          $id = $_POST['id'];
          $NIK = $_POST['NIK'];
          $nama = $_POST['nama'];
          $Hari_Meninggal = $_POST['Hari_Meninggal'];
          $Tgl_Meninggal = $_POST['Tgl_Meninggal'];
          $Tempat = $_POST['Tempat'];
          $Umur = $_POST['Umur'];

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

      $datas = mysqli_query($koneksi, "update data_kematian set status_data ='$status_data',NIK ='$NIK',nama ='$nama',Hari_Meninggal ='$Hari_Meninggal',Tgl_Meninggal = '$Tgl_Meninggal',Tempat = '$Tempat',Umur = '$Umur', Foto_Surat_Pengantar = '$Foto_Surat_Pengantar' where id = '$id'") or die(mysqli_error($koneksi));
      echo "<script>alert('data berhasil diubah.');window.location='kematian-index.php';</script>";
  }
  ?>
  <?php
    include('templates/footer.php');
  ?>

