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
            <h1>Halaman Detail Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Data</h3>
        </div>
        <div class="card-body">
          <?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_pegawai where id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
          <form action="" method="post" role="form" enctype="multipart/form-data" id="formId">
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
             <a target="_blank" href="assets/gambar/<?= $row['Foto_Pegawai']; ?>">
                <img src="assets/gambar/<?= $row['Foto_Pegawai']; ?>" style="width: 400px;">
              </a>
            </div>

            <div class="form-group">
              <label>Alamat Rumah</label>
              <textarea class="form-control" name="Alamat" required=""><?= $row['Alamat']; ?></textarea>
            </div>
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

<script type="text/javascript">
  var form  = document.getElementById("formId");
var allElements = form.elements;
for (var i = 0, l = allElements.length; i < l; ++i) {
    // allElements[i].readOnly = true;
       allElements[i].disabled=true;
}
</script>