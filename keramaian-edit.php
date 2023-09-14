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
            <h1>Halaman Edit Keramaian</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_keramaian where id = '$id'");
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
              <input type="text" name="nik"  class="form-control"  required="" value="<?= $row['nik']; ?>">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama"  class="form-control"  required="" value="<?= $row['nama']; ?>">
            </div>
            
            <div class="form-group">
              <label>No Hp</label>
              <input type="text" name="no_hp"  class="form-control"  required="" value="<?= $row['no_hp']; ?>">
            </div>
            <div class="form-group">
              <label>Acara</label>
              <input type="text" name="acara"  class="form-control"  required="" value="<?= $row['acara']; ?>">
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" name="lokasi"  class="form-control"  required="" value="<?= $row['lokasi']; ?>">
            </div>
            <div class="form-group">
              <label>Perkiraan Keramaian</label>
              <input type="number" name="jumlah_keramaian"  class="form-control"  required="" value="<?= $row['jumlah_keramaian']; ?>">
            </div>
            
            <div class="form-group">
              <label>Tanggal </label>
              <input type="date" name="tanggal"  class="form-control col-sm-2"  required="" value="<?= $row['tanggal']; ?>">
            </div>
            
            <div class="form-group">
              <label>Jam </label>
              <input type="time" name="jam"  class="form-control col-sm-2"  required="" value="<?= $row['jam']; ?>">
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control  col-sm-4 select2" name="status" >
                <option value="">Pilih Status</option>
                <option value="diizinkan" <?php echo ($row['status'] == 'diizinkan') ? 'selected' : ''; ?>>diizinkan</option>
                <option value="tidak_diizinkan" <?php echo ($row['status'] == 'tidak_diizinkan') ? 'selected' : ''; ?>>tidak diizinkan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Foto KTP (abaikan jika tidak ganti foto) - <a target="_blank" href="assets/gambar/<?= $row['foto_ktp']; ?>">Foto sebelumnya</a></label>
              <input type="file" name="foto_ktp"  class="form-control col-sm-4"  >
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
          $acara = $_POST['acara'];
          $tanggal = $_POST['tanggal'];
          $jam = $_POST['jam'];
          $lokasi = $_POST['lokasi'];
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $no_hp = $_POST['no_hp'];
          $status = $_POST['status'];
          $jumlah_keramaian = $_POST['jumlah_keramaian'];
          $status_data = $_POST['status_data'];

          $nama_gambar1   = $_FILES['foto_ktp']['name'];
          $file_tmp1    = $_FILES['foto_ktp']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = $row['foto_ktp'];
          }
          $foto_ktp = $nama_unik1;
      $datas = mysqli_query($koneksi, "update data_keramaian set status_data ='$status_data',foto_ktp ='$foto_ktp',jumlah_keramaian ='$jumlah_keramaian',nama ='$nama',acara ='$acara',tanggal ='$tanggal',jam = '$jam', lokasi = '$lokasi', nik = '$nik', no_hp = '$no_hp', status = '$status' where id = '$id'") or die(mysqli_error($koneksi));
      echo "<script>alert('data berhasil diubah.');window.location='keramaian-index.php';</script>";
  }
  ?>
  <?php
    include('templates/footer.php');
  ?>

