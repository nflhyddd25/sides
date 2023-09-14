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
            <h1>Halaman Detail Penduduk</h1>
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

          $id = $_GET['id']; //mengambil id penduduk yang ingin diubah

          //menampilkan penduduk berdasarkan id
          $data   = mysqli_query($koneksi, "select * from login_penduduk where id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
          <form action="" method="post" role="form" enctype="multipart/form-data" id="formId">
            <input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
            <div class="form-group">
              <label>Nik</label>
              <input type="text" name="nik" required="" class="form-control col-sm-4"  value="<?= $row['nik']; ?>" autofocus="">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" required="" class="form-control col-sm-4"  value="<?= $row['nama']; ?>" >
            </div>
            <!-- <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control  col-sm-4" name="jabatan" required="">
                <option value="">Pilih</option>
                <option value="Pimpinan" <?= ($row['jabatan'] == 'Pimpinan') ? 'selected' : ''; ?>>Pimpinan</option>
                <option value="Teknisi" <?= ($row['jabatan'] == 'Teknisi') ? 'selected' : ''; ?>>Teknisi</option>
                <option value="Admin" <?= ($row['jabatan'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
              </select>
            </div> -->
            <div class="form-group">
              <label>No Hp</label>
              <input type="text" name="hp" required="" class="form-control col-sm-4" value="<?= $row['hp']; ?>"  >
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" required="" class="form-control" value="<?= $row['alamat']; ?>" >
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" required="" class="form-control col-sm-4" value="<?= $row['username']; ?>">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" required="" class="form-control col-sm-4" value="<?= $row['password']; ?>">
            </div>

            <div class="form-group">
              <label>Validasi Admin</label>
              <select class="form-control  col-sm-4" name="validasi" required="">
                <option value="">Pilih</option>
                <option value="1" <?= ($row['validasi'] == '1') ? 'selected' : ''; ?>>Valid</option>
                <option value="0" <?= ($row['validasi'] == '0') ? 'selected' : ''; ?>>Belum Valid</option>
              </select>
            </div> 
            <!-- <div class="form-group">
              <label>Foto</label><br>
              <img src="assets/gambar/<?= $row['foto'];?>" width="100" class="mb-3">
              <input type="file" name="foto" class="form-control col-sm-4" >
              <i>(Abaikan jika tidak ingin ganti foto)</i>
            </div> -->
 
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