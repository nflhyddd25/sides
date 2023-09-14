<?php
  include('templates/header.php');
  include('templates/sidebar.php');
?>

<?php
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT max(nip) as kodeTerbesar FROM data_pegawai");
    $data = mysqli_fetch_array($query);
    $kode = $data['kodeTerbesar'];
     
    $urutan = (int) substr($kode, 1, 4);
    $urutan++;
     
    $huruf = "P";
    $kode = $huruf . sprintf("%04s", $urutan);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Tambah Pegawai</h1>
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
              <label>NIP</label>
              <input type="text" name="nip" required="" class="form-control" value="<?= $kode; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="Nama" required="" class="form-control" autofocus="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control  col-sm-4" name="jk" required="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="Tgl_Lahir" required="" class="form-control col-sm-2" >
            </div>
            <div class="form-group">
              <label>Tanggal Masuk</label>
              <input type="date" name="tgl_masuk" required="" class="form-control col-sm-2" >
            </div>
            
            <div class="form-group">
              <label>Alamat Rumah</label>
              <textarea class="form-control" name="Alamat" required=""></textarea>
            </div>


            <div class="form-group">
              <label>Foto</label>
              <input type="file" name="Foto_Pegawai" required="" class="form-control col-sm-4" >
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
          $nip = $_POST['nip'];
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
            $nama_unik1 = NULL;
          }
          $Foto_Pegawai = $nama_unik1;

          //query untuk menambahkan pegawai ke database, pastikan urutan nya sama dengan di database
          $datas = mysqli_query($koneksi, "insert into data_pegawai (nip,Nama,jk,Tgl_Lahir,tgl_masuk,Alamat,Foto_Pegawai)values('$nip','$Nama','$jk','$Tgl_Lahir','$tgl_masuk','$Alamat','$Foto_Pegawai')") or die(mysqli_error($koneksi));
          //id pegawai tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

          //ini untuk menampilkan alert berhasil dan redirect ke halaman index
          echo "<script>alert('data berhasil disimpan.');window.location='pegawai-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

