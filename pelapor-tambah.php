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
            <h1>Halaman Tambah Pelapor</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
              <label>Pilih Penduduk</label>
              <select class="form-control  col-sm-4 select2" name="NIK" required="">
                <option value="">Pilih Penduduk</option>
                <?php
                  include('koneksi.php'); //memanggil file koneksi
                  $datas = mysqli_query($koneksi, "select * from data_kependudukan WHERE data_kependudukan.NIK NOT IN (SELECT NIK FROM data_pelapor)") or die(mysqli_error($koneksi));
                  while($row = mysqli_fetch_assoc($datas)) {
                ?> 
                <option value="<?= $row['NIK'] ?>"><?= $row['NIK'] ?> / <?= $row['Nama'] ?></option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>No Surat</label>
              <input type="text" name="No_Surat"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Tanggal Lapor</label>
              <input type="date" name="tgl_lapor"  class="form-control col-sm-2"  required="">
            </div>
            
            <div class="form-group">
              <label>Foto Surat Pengantar</label>
              <input type="file" name="Foto_Surat_Pengantar"  class="form-control col-sm-4"  required="">
            </div>
            <div class="form-group">
              <label>Foto KTP</label>
              <input type="file" name="Foto_KTP"  class="form-control col-sm-4"  required="">
            </div>
            <div class="form-group">
              <label>Foto KK</label>
              <input type="file" name="Foto_KK"  class="form-control col-sm-4"  required="">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan"  class="form-control">
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
          $NIK = $_POST['NIK'];
          $No_Surat = $_POST['No_Surat'];
          $tgl_lapor = $_POST['tgl_lapor'];
          $keterangan = $_POST['keterangan'];

          $nama_gambar1   = $_FILES['Foto_Surat_Pengantar']['name'];
          $file_tmp1    = $_FILES['Foto_Surat_Pengantar']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = NULL;
          }
          $Foto_Surat_Pengantar = $nama_unik1;

          $nama_gambar2   = $_FILES['Foto_KTP']['name'];
          $file_tmp2    = $_FILES['Foto_KTP']['tmp_name'];   
          $acak2      = rand(1,99999);
          if($nama_gambar2 != "") {
            $nama_unik2     = $acak2.$nama_gambar2;
            move_uploaded_file($file_tmp2,'assets/gambar/'.$nama_unik2);
          } else {
            $nama_unik2 = NULL;
          }
          $Foto_KTP = $nama_unik2;

          $nama_gambar3   = $_FILES['Foto_KK']['name'];
          $file_tmp3    = $_FILES['Foto_KK']['tmp_name'];   
          $acak3      = rand(1,99999);
          if($nama_gambar3 != "") {
            $nama_unik3     = $acak3.$nama_gambar3;
            move_uploaded_file($file_tmp3,'assets/gambar/'.$nama_unik3);
          } else {
            $nama_unik3 = NULL;
          }
          $Foto_KK = $nama_unik3;

        $datas = mysqli_query($koneksi, "insert into data_pelapor (NIK,No_Surat,tgl_lapor,keterangan,Foto_Surat_Pengantar,Foto_KTP,Foto_KK)values('$NIK','$No_Surat','$tgl_lapor','$keterangan','$Foto_Surat_Pengantar', '$Foto_KTP','$Foto_KK')") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil disimpan.');window.location='pelapor-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

