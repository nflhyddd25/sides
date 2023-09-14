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
            <h1>Halaman Edit Kependudukan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kependudukan where id = '$id'");
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
              <input type="text" name="NIK"  class="form-control" autofocus="" value="<?= $row['NIK']; ?>"  required="">
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
              <label>Tanggal Lahir</label>
              <input type="date" name="Tanggal_Lahir"  class="form-control col-sm-2"  value="<?= $row['Tanggal_Lahir']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="Alamat"  class="form-control"  required=""  value="<?= $row['Alamat']; ?>">
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
              <label>Status Kawin</label>
              <select class="form-control  col-sm-4" name="S_Kawin"  required="">
                <option value="">Pilih Status</option>
                <option value="Belum Kawin"  <?php echo ($row['S_Kawin'] == 'Belum Kawin') ? 'selected' : ''; ?>>Belum Kawin</option>
                <option value="Sudah Kawin" <?php echo ($row['S_Kawin'] == 'Sudah Kawin') ? 'selected' : ''; ?>>Sudah Kawin</option>
                <option value="Cerai Hidup" <?php echo ($row['S_Kawin'] == 'Cerai Hidup') ? 'selected' : ''; ?>>Cerai Hidup</option>
                <option value="Cerai Mati" <?php echo ($row['S_Kawin'] == 'Cerai Mati') ? 'selected' : ''; ?>>Cerai Mati</option>
              </select>
            </div>  
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" name="Pekerjaan"  class="form-control col-sm-4" required="" value="<?= $row['Pekerjaan']; ?>">
            </div>
            <div class="form-group">
              <label>Pend. Terakhir</label>
              <select class="form-control  col-sm-4" name="Pen_Terakhir"  required="">
                <option value="">Pilih </option>
                <option value="Tidak Sekolah" <?php echo ($row['Pen_Terakhir'] == 'Tidak Sekolah') ? 'selected' : ''; ?>>Tidak Sekolah</option>
                <option value="TK" <?php echo ($row['Pen_Terakhir'] == 'TK') ? 'selected' : ''; ?>>TK</option>
                <option value="SD" <?php echo ($row['Pen_Terakhir'] == 'SD') ? 'selected' : ''; ?>>SD</option>
                <option value="SMP" <?php echo ($row['Pen_Terakhir'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
                <option value="SMA" <?php echo ($row['Pen_Terakhir'] == 'SMA') ? 'selected' : ''; ?>>SMA Sederajat</option>
                <option value="S1" <?php echo ($row['Pen_Terakhir'] == 'S1') ? 'selected' : ''; ?>>S1</option>
                <option value="S2" <?php echo ($row['Pen_Terakhir'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                <option value="S3" <?php echo ($row['Pen_Terakhir'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                <option value="dll" <?php echo ($row['Pen_Terakhir'] == 'dll') ? 'selected' : ''; ?>>dll</option>
              </select>
            </div><div class="form-group">
              <label>Kewarganegaraan</label>
              <select class="form-control  col-sm-4" name="Kewarganegaraan"  required="">
                <option value="">Pilih</option>
                <option value="WNI" <?php echo ($row['Kewarganegaraan'] == 'WNI') ? 'selected' : ''; ?>>WNI</option>
                <option value="WNA" <?php echo ($row['Kewarganegaraan'] == 'WNA') ? 'selected' : ''; ?>>WNA</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tidak Mampu?</label>
              <select class="form-control  col-sm-4" name="ket_mampu"  required="">
                <option value="">Pilih</option>
                <option value="mampu" <?php echo ($row['ket_mampu'] == 'mampu') ? 'selected' : ''; ?>>mampu</option>
                <option value="tidak_mampu" <?php echo ($row['ket_mampu'] == 'tidak_mampu') ? 'selected' : ''; ?>>tidak mampu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tgl Pelaporan</label>
              <input type="date" name="Tgl_Pelaporan"  class="form-control col-sm-2" value="<?= $row['Tgl_Pelaporan']; ?>" >
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="Keterangan"  class="form-control"  value="<?= $row['Keterangan']; ?>" >
            </div>
            <div class="form-group">
              <label>Foto KTP Pengantar (abaikan jika tidak ganti foto) - <a target="_blank" href="assets/gambar/<?= $row['Foto_KTP']; ?>">Foto sebelumnya</a></label>
              <input type="file" name="Foto_KTP"  class="form-control col-sm-4"  >
            </div>
            <div class="form-group">
              <label>Foto KK Pengantar (abaikan jika tidak ganti foto) - <a target="_blank" href="assets/gambar/<?= $row['Foto_KK']; ?>">Foto sebelumnya</a></label>
              <input type="file" name="Foto_KK"  class="form-control col-sm-4"  >
            </div>

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
          $No_Surat = $_POST['No_Surat'];
          $No_KK = $_POST['No_KK'];
          $Nama = $_POST['Nama'];
          $J_Kelamin = $_POST['J_Kelamin'];
          $Alamat = $_POST['Alamat'];
          $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
          $Agama = $_POST['Agama'];
          $Tempat_Lahir = $_POST['Tempat_Lahir'];
          $S_Kawin = $_POST['S_Kawin'];
          $Agama = $_POST['Agama'];
          $Pekerjaan = $_POST['Pekerjaan'];
          $Pen_Terakhir = $_POST['Pen_Terakhir'];
          $Kewarganegaraan = $_POST['Kewarganegaraan'];
          $Tgl_Pelaporan = $_POST['Tgl_Pelaporan'];
          $Keterangan = $_POST['Keterangan'];
          $ket_mampu = $_POST['ket_mampu'];

          $nama_gambar1   = $_FILES['Foto_KTP']['name'];
          $file_tmp1    = $_FILES['Foto_KTP']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = $row['Foto_KTP'];
          }

          $Foto_KTP = $nama_unik1;

          $nama_gambar2   = $_FILES['Foto_KK']['name'];
          $file_tmp2    = $_FILES['Foto_KK']['tmp_name'];   
          $acak2      = rand(1,99999);
          if($nama_gambar2 != "") {
            $nama_unik2     = $acak2.$nama_gambar2;
            move_uploaded_file($file_tmp2,'assets/gambar/'.$nama_unik2);
          } else {
            $nama_unik2 = $row['Foto_KK'];
          }

           $Foto_KK = $nama_unik2;

         

  $datas = mysqli_query($koneksi, "update data_kependudukan set NIK = '$NIK',No_KK ='$No_KK',Nama = '$Nama',J_Kelamin = '$J_Kelamin',Alamat='$Alamat' ,Agama= '$Agama' ,Tempat_Lahir='$Tempat_Lahir' ,Tanggal_Lahir='$Tanggal_Lahir' ,S_Kawin='$S_Kawin',Agama='$Agama' ,Pekerjaan='$Pekerjaan',Pen_Terakhir='$Pen_Terakhir',Kewarganegaraan='$Kewarganegaraan',Tgl_Pelaporan='$Tgl_Pelaporan',Keterangan='$Keterangan',ket_mampu='$ket_mampu',Foto_KTP='$Foto_KTP',Foto_KK='$Foto_KK' where id = '$id'") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil diubah.');window.location='kependudukan-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

