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

  <style>@page { size: A4;}
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
<body class="A4">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25-  -->
  <section class="sheet padding-10mm " style="height: auto;font-size: 10px;overflow: auto; ">
    <img src="assets/gambar/logo.png" style="width: 65px;float: left;margin-right: 10px;"  class="text-center">
    <h1 class="text-left">PEMERINTAH KABUPATEN BUMI</h1>
    <h1 class="text-left">KECAMATAN BUMI</h1>
    <h1 class="text-left">DESA Utara</h1>
    <h3 class="text-left">Jl. Abc RT 04 RW 02 Kode Pos 70000</h3><div style="width: 100%;height: 2px;background-color: #3d3d3d;-webkit-print-color-adjust: exact;"></div>
    <h4 class="text-center">SURAT PERNYATAAN DOMISILI</h4>
    <hr>
        <?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select * from data_domisili where id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
          <p style="text-align:justify;font-size:11px;"></p>
          <table class="" style="font-size:12px;" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3" style="text-align:justify;">Saya yang bertanda tangan dibawah ini</td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Nama</td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['nama'] ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Tempat, Tgl Lahir </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['tempat_lahir'] ?>, <?= format_tanggal($row['tgl_lahir']); ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Agama </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['agama'] ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Nama Ibu </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['ibu'] ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Nama Ayah </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['ayah'] ?></td>
            </tr>

             <tr>
              <td colspan="3" style="text-align:justify;">Menyatakan bahwa saya sudah tinggal selama <?= $row['lama'] ?> tahun di alamat <?= $row['alamat'] ?> Kelurahan/Desa <?= $row['kelurahan'] ?> Kecamatan <?= $row['kecamatan'] ?> Kabupaten Tanah Laut.</td>
            </tr>
          </table>
        <table class=" " style="width: 200px;font-size: 11px;float:left;margin-top: 20px;">
                    <tr>
                      <th colspan="2">BAHRANI, B. <?= format_tanggal(date('Y-m-d')); ?></th>
                    </tr>
                    <tr style="height: 100px;">
                      <td style="width: 50%">
                        
                      </td>
                    </tr>
                    <tr>
                      <td>
                       Kepala Dinas,
                      </td>
                    </tr>
                </table>
        <table class=" " style="width: 200px;font-size: 11px;float:right;margin-top: 20px;">
                    <tr>
                      <th colspan="2">Yang membuat pernyataan</th>
                    </tr>
                    <tr style="height: 100px;">
                      <td style="width: 50%">
                        (Materai 6000)
                      </td>
                    </tr>
                    <tr>
                      <td>
                       <?= $row['nama'] ?>
                      </td>
                    </tr>
                </table>
  </section>

</body>
</html>
