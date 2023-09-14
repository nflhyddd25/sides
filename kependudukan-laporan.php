<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">  
  <title>LAPORAN - KELURAHAN Utara</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="assets/dist/css/normalize.min.css">
  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="assets/dist/css/paper.css">
  <link rel="stylesheet" href="assets/dist/css/bs.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "" if you need -->

  <style>@page { size: A4 landscape;}
* {
  font-family: "Arial";
}
.text-center {
  text-align: center;
}
h1 {
  font-size: 20px;
  line-height: 20px;
  text-align: center;
}
h3 {
  font-size: 14px;
  font-weight: normal;
  margin-top: -8px;
  line-height: 40px;
  text-align: center;
}
h4 {
  margin-top: 20px;
  text-transform: uppercase;
  margin-bottom: -10px;
}
td {
  padding: 5px !important;
  text-align: center;
  vertical-align: middle !important;
 /* border-color: #fff !important;
  padding: 5px !important;*/
  /*text-transform: capitalize;*/
}
</style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25-  -->
  <section class="sheet padding-10mm " style="height: auto;font-size: 10px;overflow: auto; ">
    <img src="assets/gambar/logo.png" style="width: 65px;float: left;margin-right: 10px;"  class="text-center">
    <h1 class="text-left">PEMERINTAH KABUPATEN BUMI</h1>
    <h1 class="text-left">KECAMATAN BUMI</h1>
    <h1 class="text-left">DESA Utara</h1>
    <h3 class="text-left">Jl. Abc RT 04 RW 02 Kode Pos 70000</h3><div style="width: 100%;height: 2px;background-color: #3d3d3d;-webkit-print-color-adjust: exact;"></div>
    <h4 class="text-center">LAPORAN DATA KEPENDUDUKAN</h4>
    <hr>
         <table class="table table-bordered no-wrap" style="white-space: nowrap;"  id="example2">
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>No KK</th>
              <th>Nama</th>
              <th>Jenkel</th>
              <th>Tgl Lahir</th>
              <th>Tempat Lahir</th>
              <th>Agama</th>
              <th>Alamat</th>
              <th>Status Kawin</th>
              <th>Pekerjaan</th>
              <th>Pend. Terakhir</th>
              <th>Kewarganegaraan</th>
              <th>Tgl Pelaporan</th>
              <th>Keterangan</th> 
            </tr>
          </thead>
          <tbody>
            <?php
              include('koneksi.php'); //memanggil file koneksi
              $datas = mysqli_query($koneksi, "select * from data_kependudukan") or die(mysqli_error($koneksi));

              $no = 1;//untuk pengurutan nomor

              //melakukan perulangan
              while($row = mysqli_fetch_assoc($datas)) {
            ?>  

          <tr >
            <td><?= $no; ?></td>
            <td><?= $row['NIK']; ?></td>
            <td><?= $row['No_KK']; ?></td>
            <td><?= $row['Nama']; ?></td>
            <td><?= $row['J_Kelamin']; ?></td>
            <td><?= format_tanggal($row['Tanggal_Lahir']); ?></td>
            <td><?= $row['Tempat_Lahir']; ?></td>
            <td><?= $row['Agama']; ?></td>
            <td><?= $row['Alamat']; ?></td>
            <td><?= $row['S_Kawin']; ?></td>
            <td><?= $row['Pekerjaan']; ?></td>
            <td><?= $row['Pen_Terakhir']; ?></td>
            <td><?= $row['Kewarganegaraan']; ?></td>
            <td><?= format_tanggal($row['Tgl_Pelaporan']); ?></td>
            <td><?= $row['Keterangan']; ?></td> 
          </tr>

            <?php $no++; } ?>
          </tbody>
        </table>
        <table class="table table-bordered" style="width: 200px;font-size: 11px;float:right;margin-top: 20px;">
                    <tr>
                      <th colspan="2">BUMI, <?= format_tanggal(date('Y-m-d')); ?></th>
                    </tr>
                    <tr style="height: 100px;">
                      <td style="width: 50%">
                        
                      </td>
                    </tr>
                    <tr>
                      <td>
                        BAHRANI, B.
                      </td>
                    </tr>
                </table>
  </section>

</body>
</html>
