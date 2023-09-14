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
            <h1>Halaman Edit Kartu Identitas Anak</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_kia where id = '$id'");
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
              <label>No Registrasi</label>
              <input type="text" name="no_reg"  class="form-control"  required="" value="<?= $row['no_reg']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>No KK</label>
              <input type="text" name="no_kk"  class="form-control"  required="" autofocus="" value="<?= $row['no_kk']; ?>" >
            </div>
            <div class="form-group">
              <label>Nama Anak</label>
              <input type="text" name="nama_anak"  class="form-control"  required="" value="<?= $row['nama_anak']; ?>" >
            </div>
            <div class="form-group">
              <label>Nik Anak</label>
              <input type="text" name="nik_anak"  class="form-control"  required="" value="<?= $row['nik_anak']; ?>" >
            </div>
            <div class="form-group">
              <label>No. Akta Kelahiran</label>
              <input type="text" name="no_akta"  class="form-control"  required="" value="<?= $row['no_akta']; ?>" >
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir"  class="form-control"  required="" value="<?= $row['tempat_lahir']; ?>" >
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_lahir"  class="form-control col-sm-2"  required="" value="<?= $row['tgl_lahir']; ?>" >
            </div>
            <div class="form-group">
              <label>Anak Ke-</label>
              <input type="text" name="anak_ke"  class="form-control col-sm-2"  required="" value="<?= $row['anak_ke']; ?>" >
            </div>
            <div class="form-group">
              <label>Gol. Darah</label>
              <input type="text" name="gol_darah"  class="form-control col-sm-2"  required="" value="<?= $row['gol_darah']; ?>" >
            </div>
            <div class="form-group">
              <label>Nama Ayah</label>
              <input type="text" name="ayah"  class="form-control"  required="" value="<?= $row['ayah']; ?>">
            </div>
            <div class="form-group">
              <label>Nama Ibu</label>
              <input type="text" name="ibu"  class="form-control"  required="" value="<?= $row['ibu']; ?>">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat"  class="form-control"  required="" value="<?= $row['alamat']; ?>">
            </div>
            
            <div class="form-group">
               <label>Foto (abaikan jika tidak ganti foto) - <a target="_blank" href="assets/gambar/<?= $row['foto']; ?>">Foto sebelumnya</a></label>
              <input type="file" name="foto"  class="form-control col-sm-4"  >
               <input name="foto_lama" hidden value="<?= $row['foto']; ?>">
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
          $status_data = $_POST['status_data'];
           $no_reg = $_POST['no_reg'];
          $nik_anak = $_POST['nik_anak'];
          $no_kk = $_POST['no_kk'];
          $nama_anak = $_POST['nama_anak'];
          $no_akta = $_POST['no_akta'];
          $tempat_lahir = $_POST['tempat_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $alamat = $_POST['alamat'];
          $anak_ke = $_POST['anak_ke'];
          $gol_darah = $_POST['gol_darah'];
          $ayah = $_POST['ayah'];
          $ibu = $_POST['ibu'];
          $foto_lama = $_POST['foto_lama'];

          $nama_gambar1   = $_FILES['foto']['name'];
          $file_tmp1    = $_FILES['foto']['tmp_name'];   
          $acak1      = rand(1,99999);
          if($nama_gambar1 != "") {
            $nama_unik1     = $acak1.$nama_gambar1;
            move_uploaded_file($file_tmp1,'assets/gambar/'.$nama_unik1);
          } else {
            $nama_unik1 = $row['foto_lama'];
          }

          $foto = $nama_unik1;
         

  $datas = mysqli_query($koneksi, "update data_kia set status_data ='$status_data',nik_anak = '$nik_anak',no_kk ='$no_kk',nik_anak = '$nik_anak',nama_anak = '$nama_anak',no_akta='$no_akta' ,tempat_lahir= '$tempat_lahir' ,tgl_lahir='$tgl_lahir' ,anak_ke='$anak_ke' ,gol_darah='$gol_darah',ayah='$ayah' ,ibu='$ibu',alamat='$alamat',foto='$foto' where id = '$id'") or die(mysqli_error($koneksi));
          echo "<script>alert('data berhasil diubah.');window.location='kia-index.php';</script>";
        }
        ?>
  <?php
    include('templates/footer.php');
  ?>

