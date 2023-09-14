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
            <h1>Halaman Detail Pelapor</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_pelapor where id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Data</h3>
        </div>
        <div class="card-body">
          <form action="" method="post" role="form" enctype="multipart/form-data" id="formId">
            <input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
            <div class="form-group">
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
            </div>
            <div class="form-group">
              <label>No Surat</label>
              <input type="text" name="No_Surat"  class="form-control" autofocus="" value="<?= $row['No_Surat']; ?>"  required="">
            </div>
            
            <div class="form-group">
              <label>Tanggal Lapor</label>
              <input type="date" name="tgl_lapor"  class="form-control col-sm-2"  required="" value="<?= $row['tgl_lapor']; ?>">
            </div>
            
            <div class="form-group">
              <label>Foto Surat Pengantar</label>
              <a target="_blank" href="assets/gambar/<?= $row['Foto_Surat_Pengantar']; ?>">
                <img src="assets/gambar/<?= $row['Foto_Surat_Pengantar']; ?>" style="width: 100px;">
              </a>
            </div>
            <div class="form-group">
              <label>Foto KTP </label><a target="_blank" href="assets/gambar/<?= $row['Foto_KTP']; ?>">
                <img src="assets/gambar/<?= $row['Foto_KTP']; ?>" style="width: 100px;">
              </a>
            </div>
            <div class="form-group">
              <label>Foto KK</label><a target="_blank" href="assets/gambar/<?= $row['Foto_KK']; ?>">
                <img src="assets/gambar/<?= $row['Foto_KK']; ?>" style="width: 100px;">
              </a>
            </div>

            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan"  class="form-control" value="<?= $row['keterangan']; ?>" >
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
            $nama_unik1 = $row['Foto_Surat_Pengantar'];
          }
          $Foto_Surat_Pengantar = $nama_unik1;

          $nama_gambar2   = $_FILES['Foto_KTP']['name'];
          $file_tmp2    = $_FILES['Foto_KTP']['tmp_name'];   
          $acak2      = rand(1,99999);
          if($nama_gambar2 != "") {
            $nama_unik2     = $acak2.$nama_gambar2;
            move_uploaded_file($file_tmp2,'assets/gambar/'.$nama_unik2);
          } else {
            $nama_unik2 = $row['Foto_KTP'];
          }
          $Foto_KTP = $nama_unik2;

          $nama_gambar3   = $_FILES['Foto_KK']['name'];
          $file_tmp3    = $_FILES['Foto_KK']['tmp_name'];   
          $acak3      = rand(1,99999);
          if($nama_gambar3 != "") {
            $nama_unik3     = $acak3.$nama_gambar3;
            move_uploaded_file($file_tmp3,'assets/gambar/'.$nama_unik3);
          } else {
            $nama_unik3 = $row['Foto_KK'];
          }
          $Foto_KK = $nama_unik3;

      $datas = mysqli_query($koneksi, "update data_pelapor set No_Surat ='$No_Surat',keterangan ='$keterangan',tgl_lapor = '$tgl_lapor', Foto_Surat_Pengantar = '$Foto_Surat_Pengantar', Foto_KTP = '$Foto_KTP', Foto_KK = '$Foto_KK' where id = '$id'") or die(mysqli_error($koneksi));
      echo "<script>alert('data berhasil diubah.');window.location='pelapor-index.php';</script>";
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
