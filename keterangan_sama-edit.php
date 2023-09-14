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
            <h1>Halaman Edit Keterangan Orang Sama/Beda</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_keterangan_sama where id = '$id'");
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
              <label>Jenis Kelamin</label>
              <select class="form-control  col-sm-4" name="jenkel"  required="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Pria" <?php echo ($row['jenkel'] == 'Pria') ? 'selected' : ''; ?> >Pria</option>
                <option value="Wanita" <?php echo ($row['jenkel'] == 'Wanita') ? 'selected' : ''; ?> >Wanita</option>
              </select>
            </div>
             <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir"  class="form-control"  required="" value="<?= $row['tempat_lahir']; ?>">
            </div>
            <div class="form-group">
              <label>Tgl Lahir</label>
              <input type="date" name="tgl_lahir"  class="form-control"  required="" value="<?= $row['tgl_lahir']; ?>">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="" value="<?= $row['alamat']; ?>">
            </div>
              <hr>

            <div class="form-group">
              <label>NIK orang yang dimaksud</label>
              <input type="text" name="nik_orang"  class="form-control"  required="" value="<?= $row['nik_orang']; ?>">
            </div>
            <div class="form-group">
              <label>Nama orang yang dimaksud</label>
              <input type="text" name="nama_orang"  class="form-control"  required="" value="<?= $row['nama_orang']; ?>">
            </div>  

            <div class="form-group">
              <label>Adalah</label>
              <select class="form-control  col-sm-4" name="status"  required="">
                <option value="">Pilih Keterangan</option>
                <option value="org_sama"  <?php echo ($row['status'] == 'org_sama') ? 'selected' : ''; ?>>Orang yang sama</option>
                <option value="org_berbeda" <?php echo ($row['status'] == 'org_berbeda') ? 'selected' : ''; ?>>Orang yang berbeda</option>
              </select>
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
          $tempat_lahir = $_POST['tempat_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $jenkel = $_POST['jenkel'];
          $alamat = $_POST['alamat'];
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $nik_orang = $_POST['nik_orang'];
          $status = $_POST['status'];
          $nama_orang = $_POST['nama_orang'];
          $status_data = $_POST['status_data'];

      $datas = mysqli_query($koneksi, "update data_keterangan_sama set status_data ='$status_data',tempat_lahir ='$tempat_lahir',tgl_lahir ='$tgl_lahir',jenkel ='$jenkel',alamat ='$alamat',nik ='$nik',nama = '$nama', nik_orang = '$nik_orang', status = '$status', nama_orang = '$nama_orang' where id = '$id'") or die(mysqli_error($koneksi));
      echo "<script>alert('data berhasil diubah.');window.location='keterangan_sama-index.php';</script>";
  }
  ?>
  <?php
    include('templates/footer.php');
  ?>

