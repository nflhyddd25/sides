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
            <h1>Halaman Tambah Kepindahan</h1>
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
          <!--   <div class="form-group">
              <label>Pilih Penduduk</label>
              <select class="form-control  col-sm-4 select2" name="NIK" required="">
                <option value="">Pilih Penduduk</option>
                <?php
                  include('koneksi.php'); //memanggil file koneksi
                  $datas = mysqli_query($koneksi, "select * from data_kependudukan WHERE data_kependudukan.NIK NOT IN (SELECT NIK FROM data_kepindahan)") or die(mysqli_error($koneksi));
                  while($row = mysqli_fetch_assoc($datas)) {
                ?> 
                <option value="<?= $row['NIK'] ?>"><?= $row['NIK'] ?> / <?= $row['Nama'] ?></option>
              <?php } ?>
              </select>
            </div> -->
            <div class="form-group">
              <label>No Surat</label>
              <input type="text" name="No_Surat"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>NIK</label>
              <input type="text" name="NIK"  class="form-control"   required="">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" required="" class="form-control col-sm-4" >
            </div> 
            <div class="form-group">
              <label>Alamat Pindah</label>
              <input type="text" name="Alamat_Pindah"  class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Tanggal Pindah</label>
              <input type="date" name="Tanggal_Pindah"  class="form-control col-sm-2"  required="">
            </div>
            
            <div class="form-group">
              <label>Foto Surat Pengantar</label>
              <input type="file" name="Foto_Surat_Pengantar"  class="form-control col-sm-4"  required="">
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
          $user_id = $_SESSION['user_id'];
          //menampung data dari inputan
          $NIK = $_POST['NIK'];
          $nama = $_POST['nama'];
          $No_Surat = $_POST['No_Surat'];
          $Tanggal_Pindah = $_POST['Tanggal_Pindah'];
          $Alamat_Pindah = $_POST['Alamat_Pindah'];

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

  $datas = mysqli_query($koneksi, "insert into data_kepindahan (NIK,No_Surat,Tanggal_Pindah,Alamat_Pindah,Foto_Surat_Pengantar,user_id,nama)values('$NIK','$No_Surat','$Tanggal_Pindah','$Alamat_Pindah','$Foto_Surat_Pengantar','$user_id','$nama')") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil disimpan.');window.location='kepindahan-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

