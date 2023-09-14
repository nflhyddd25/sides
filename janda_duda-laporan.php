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

        <?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select data_janda_duda.* from data_janda_duda where data_janda_duda.id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
    <h4 class="text-center">SURAT KETERANGAN <?= $row['status'] ?></h4>
    <hr>
          <p style="text-align:justify;font-size:11px;"></p>
          <table class="" style="font-size:12px;" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3" style="text-align:justify;">Camat Bumi Makmur atas Nama Bupati Tanah Laut dengan ini menerangkan bahwa :</td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">NIK </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'janda') ? $row['nik_istri'] : $row['nik_suami']; ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Nama </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'janda') ? $row['nama_istri'] : $row['nama_suami']; ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Pekerjaan </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'janda') ? $row['pekerjaan_istri'] : $row['pekerjaan_suami']; ?></td>
            </tr>
           <!--  <tr>
              <td style="text-align:left;width: 160px;">Alamat </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'janda') ? $row['alamat_istri'] : $row['alamat_suami']; ?></td>
            </tr> -->
             <tr>
              <td colspan="3" style="text-align:justify;">Bahwa yang namanya tersebut diatas telah menjadi <?= $row['status']; ?>, dengan <?= ($row['status'] == 'janda') ? 'suaminya' : 'istrinya'; ?> :</td>
            </tr>
            
            <tr>
              <td style="text-align:left;width: 160px;">NIK </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'duda') ? $row['nik_istri'] : $row['nik_suami']; ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Nama </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'duda') ? $row['nama_istri'] : $row['nama_suami']; ?></td>
            </tr><!-- 
            <tr>
              <td style="text-align:left;width: 160px;">Tempat, Tgl Lahir </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'duda') ? $row['tempat_istri'] : $row['tempat_suami']; ?>,<?= ($row['status'] == 'duda') ? format_tanggal($row['tanggal_istri']) : format_tanggal($row['tanggal_suami']); ?></td>
            </tr> -->
            <tr>
              <td style="text-align:left;width: 160px;">Pekerjaan </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'duda') ? $row['pekerjaan_istri'] : $row['pekerjaan_suami']; ?></td>
            </tr>
        <!--     <tr>
              <td style="text-align:left;width: 160px;">Alamat </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= ($row['status'] == 'duda') ? $row['alamat_istri'] : $row['alamat_suami']; ?></td>
            </tr> -->

             <tr>
              <td colspan="3" style="text-align:justify;">Demikian Surat Keterangan ini dibuat atas permintaan nama tersebut untuk dapat dipergunakan sebagai mana mestinya.</td>
            </tr>
          </table>
         <table class="table table-bordered" style="width: 200px;font-size: 11px;float:right;margin-top: 20px;">
                    <tr>
                      <th colspan="2">KEPALA DESA Utara</th>
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
