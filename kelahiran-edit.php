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
            <h1>Halaman Edit Kelahiran</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kelahiran where id = '$id'");
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
              <label>NIKS</label>
              <input type="text" name="NIKS"  class="form-control" autofocus="" value="<?= $row['NIKS']; ?>"  required="">
            </div>
            <div class="form-group">
              <label>No Surat</label>
              <input type="text" name="No_Surat"  class="form-control" value="<?= $row['No_Surat']; ?>"  required="">
            </div>
            <div class="form-group">
              <label>No KK</label>
              <input type="text" name="No_KK"  class="form-control" value="<?= $row['No_KK']; ?>"  required="">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="Nama"  class="form-control" value="<?= $row['Nama']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control  col-sm-4" name="J_Kelamin"  required="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria" <?php echo ($row['J_Kelamin'] == 'Pria') ? 'selected' : ''; ?> >Pria</option>
                <option value="Wanita" <?php echo ($row['J_Kelamin'] == 'Wanita') ? 'selected' : ''; ?> >Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="Tempat_Lahir"  class="form-control" value="<?= $row['Tempat_Lahir']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Hari Lahir</label>
              <select class="form-control  col-sm-4" name="Hari_Lahir"  required="">
                <option value="">Pilih Hari</option>
                <option value="Senin" <?php echo ($row['Hari_Lahir'] == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                <option value="Selasa" <?php echo ($row['Hari_Lahir'] == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                <option value="Rabu" <?php echo ($row['Hari_Lahir'] == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                <option value="Kamis" <?php echo ($row['Hari_Lahir'] == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                <option value="Jumat" <?php echo ($row['Hari_Lahir'] == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                <option value="Sabtu" <?php echo ($row['Hari_Lahir'] == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                <option value="Minggu" <?php echo ($row['Hari_Lahir'] == 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Pukul</label>
              <input type="time" name="Pukul"  class="form-control col-sm-2" value="<?= $row['Pukul']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_Lahir"  class="form-control col-sm-2" value="<?= $row['tgl_Lahir']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Anak Ke</label>
              <input type="text" name="Anak_Ke"  class="form-control col-sm-2" value="<?= $row['Anak_Ke']; ?>" required="">
            </div>
             <div class="form-group">
              <label>Agama</label>
              <select class="form-control  col-sm-4" name="Agama"  required="">
                <option value="">Pilih</option>
                <option value="Islam" <?php echo ($row['Agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="Protestan" <?php echo ($row['Agama'] == 'Protestan') ? 'selected' : ''; ?>>Protestan</option>
                <option value="Katholik" <?php echo ($row['Agama'] == 'Katholik') ? 'selected' : ''; ?>>Katholik</option>
                <option value="Hindu" <?php echo ($row['Agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                <option value="Buddha" <?php echo ($row['Agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Pendaftaran</label>
              <input type="date" name="Tanggal_Pendaftaran"  class="form-control col-sm-2" value="<?= $row['Tanggal_Pendaftaran']; ?>"  required="">
            </div>
            <div class="form-group">
              <label>Foto KTP Pengantar (abaikan jika tidak ganti foto) - <a target="_blank" href="assets/gambar/<?= $row['Foto_KTP_Pengantar']; ?>">Foto sebelumnya</a></label>
              <input type="file" name="Foto_KTP_Pengantar"  class="form-control col-sm-4"  >
            </div>
            <div class="form-group">
              <label>Foto KK Pengantar (abaikan jika tidak ganti foto) - <a target="_blank" href="assets/gambar/<?= $row['Foto_KK_Melahirkan']; ?>">Foto sebelumnya</a></label>
              <input type="file" name="Foto_KK_Melahirkan"  class="form-control col-sm-4"  >
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
          $NIKS = $_POST['NIKS'];
          $No_Surat = $_POST['No_Surat'];
          $No_KK = $_POST['No_KK'];
          $Nama = $_POST['Nama'];
          $J_Kelamin = $_POST['J_Kelamin'];
          $Hari_Lahir = $_POST['Hari_Lahir'];
          $tgl_Lahir = $_POST['tgl_Lahir'];
          $Pukul = $_POST['Pukul'];
          $Tempat_Lahir = $_POST['Tempat_Lahir'];
          $tgl_Lahir = $_POST['tgl_Lahir'];
          $Anak_Ke = $_POST['Anak_Ke'];
          $Agama = $_POST['Agama'];
          $Tanggal_Pendaftaran = $_POST['Tanggal_Pendaftaran'];

          $nama_gambar1   = $_FILES['Foto_KTP_Pengantar']['name'];
          $file_tmp1    = $_FILES['Foto_KTP_Pengantar']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = $row['Foto_KTP_Pengantar'];
          }

          $Foto_KTP_Pengantar = $nama_unik1;

          $nama_gambar2   = $_FILES['Foto_KK_Melahirkan']['name'];
          $file_tmp2    = $_FILES['Foto_KK_Melahirkan']['tmp_name'];   
          $acak2      = rand(1,99999);
          if($nama_gambar2 != "") {
            $nama_unik2     = $acak2.$nama_gambar2;
            move_uploaded_file($file_tmp2,'assets/gambar/'.$nama_unik2);
          } else {
            $nama_unik2 = $row['Foto_KK_Melahirkan'];
          }

           $Foto_KK_Melahirkan = $nama_unik2;

         $status_data = $_POST['status_data'];

  $datas = mysqli_query($koneksi, "update data_kelahiran set status_data ='$status_data',NIKS = '$NIKS',No_Surat = '$No_Surat',No_KK ='$No_KK',Nama = '$Nama',J_Kelamin = '$J_Kelamin',Hari_Lahir='$Hari_Lahir' ,Pukul= '$Pukul' ,Tempat_Lahir='$Tempat_Lahir' ,tgl_Lahir='$tgl_Lahir' ,Anak_Ke='$Anak_Ke',Agama='$Agama' ,Tanggal_Pendaftaran='$Tanggal_Pendaftaran',Foto_KTP_Pengantar='$Foto_KTP_Pengantar',Foto_KK_Melahirkan='$Foto_KK_Melahirkan' where id = '$id'") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil diubah.');window.location='kelahiran-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

