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
            <h1>Halaman Edit Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data</h3>
        </div>
        <div class="card-body">
          <?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_pegawai where id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
          <form action="" method="post" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
            <div class="form-group">
              <label>NIP</label>
              <input type="text" name="nip" readonly="" class="form-control" value="<?= $row['nip']; ?>">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="Nama" required="" class="form-control" autofocus="" value="<?= $row['Nama']; ?>">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control  col-sm-4" name="jk" required="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria" <?php echo ($row['jk'] == 'Pria') ? 'selected' : ''; ?> >Pria</option>
                <option value="Wanita" <?php echo ($row['jk'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="Tgl_Lahir" required="" class="form-control col-sm-2" value="<?= $row['Tgl_Lahir']; ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Masuk</label>
              <input type="date" name="tgl_masuk" required="" class="form-control col-sm-2" value="<?= $row['tgl_masuk']; ?>">
            </div>

             <div class="form-group">
              <label>Foto (abaikan jika tidak ganti foto) - <a target="_blank" href="assets/gambar/<?= $row['Foto_Pegawai']; ?>">Foto sebelumnya</a></label>
              <input type="file" name="Foto_Pegawai" class="form-control col-sm-4" >
            </div>

            <!-- <div class="form-group">
              <label>Pendidikan Terakhir</label>
              <select class="form-control  col-sm-4" name="pend_terakhir" required="">
                <option value="">Pilih Pendidikan Terakhir</option>
                <option value="Tidak Sekolah" <?php echo ($row['pend_terakhir'] == 'Tidak Sekolah') ? 'selected' : ''; ?>>Tidak Sekolah</option>
                <option value="TK" <?php echo ($row['pend_terakhir'] == 'TK') ? 'selected' : ''; ?>>TK</option>
                <option value="SD" <?php echo ($row['pend_terakhir'] == 'SD') ? 'selected' : ''; ?>>SD</option>
                <option value="SMP" <?php echo ($row['pend_terakhir'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
                <option value="SMA" <?php echo ($row['pend_terakhir'] == 'SMA') ? 'selected' : ''; ?>>SMA</option>
                <option value="D3" <?php echo ($row['pend_terakhir'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                <option value="S1" <?php echo ($row['pend_terakhir'] == 'S1') ? 'selected' : ''; ?>>S1</option>
                <option value="S2" <?php echo ($row['pend_terakhir'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                <option value="S3" <?php echo ($row['pend_terakhir'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                <option value="Lainnya" <?php echo ($row['pend_terakhir'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
              </select>
            </div> -->

            <div class="form-group">
              <label>Alamat Rumah</label>
              <textarea class="form-control" name="Alamat" required=""><?= $row['Alamat']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="simpan">Ubah data</button>
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
          $Nama = $_POST['Nama'];
          $jk = $_POST['jk'];
          $Tgl_Lahir = $_POST['Tgl_Lahir'];
          $tgl_masuk = $_POST['tgl_masuk'];
          $Alamat = $_POST['Alamat'];
     
          $nama_gambar1   = $_FILES['Foto_Pegawai']['name'];
          $file_tmp1    = $_FILES['Foto_Pegawai']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = $row['Foto_Pegawai'];
          }
          $Foto_Pegawai = $nama_unik1;
          
              $datas = mysqli_query($koneksi, "update data_pegawai set Nama = '$Nama',jk = '$jk',Alamat = '$Alamat',Tgl_Lahir = '$Tgl_Lahir',tgl_masuk = '$tgl_masuk',Foto_Pegawai = '$Foto_Pegawai' where id = '$id'") or die(mysqli_error($koneksi));
          


            echo "<script>alert('data berhasil diubah.');window.location='pegawai-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

