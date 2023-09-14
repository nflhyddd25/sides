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
    <h4 class="text-center">SURAT DISPENSASI NIKAH</h4>
    <hr>
        <?php
          include('koneksi.php');

          $id = $_GET['id']; 
          $data   = mysqli_query($koneksi, "select data_dispensasi.* from data_dispensasi where data_dispensasi.id = '$id'");
          $row  = mysqli_fetch_assoc($data);
          ?>
          <p style="text-align:justify;font-size:11px;"></p>
          <table class="" style="font-size:12px;width:100%;" cellpadding="0" cellspacing="0">
            <tr>
              <td style="text-align:left;width: 160px;">Lampiran</td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"> Berkas Nikah <div class="float-right" style="float:right !important;">Utara, <?= format_tanggal(date('Y-m-d')); ?> </div></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Hal</td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"> Mohon Dispensasi Camat</td>
            </tr>
            <tr>
              <td colspan="3" style="text-align:justify;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assalamualaikum Wr. Wb, Sehubungan dengan pemberitahuan rencana pelaksanaan Akad Nikah antara : </td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">NIK </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['nik_suami'] ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Nama </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['nama_suami'] ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Pekerjaan </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['pekerjaan_suami']; ?></td>
            </tr>
             <tr>
              <td colspan="3" style="text-align:justify;">Yang akan melangsungkan pernikahan dengan :</td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">NIK Calon Istri</td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['nik_istri'] ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Nama </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['nama_istri'] ?></td>
            </tr>
            <tr>
              <td style="text-align:left;width: 160px;">Pekerjaan </td>
              <td style="width:10px;">:</td>
              <td style="text-align:left;"><?= $row['pekerjaan_istri'] ?></td>
            </tr>
             <tr>
              <td colspan="3" style="text-align:justify;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang disampaikan pada kami kurang dari 10 (sepuluh) hari kerja, oleh karena itu sesuai dengan PMA.RI NO.11 Tahun 2007 Pasal 16 Ayat 3 kami mohon kira nya dapat diberikan surat dispensasi nikah kepada yang bersangkutan sebagai persyaratan pelaksanaan akad nikah. Karena waktu akad nikah sudah disepakati bersama.</td>
            </tr><!-- 
             <tr>
              <td colspan="3" style="text-align:justify;">1. <?= $row['keterangan']; ?></td>
            </tr>
             <tr>
              <td colspan="3" style="text-align:justify;">2. Akad Nikah dilangsungkan pada tanggal : <?= format_tanggal($row['tanggal']) ?> </td>
            </tr> -->
             <tr>
              <td colspan="3" style="text-align:justify;">Demikian penyampaian kami, atas perhatian dan kerjasama yang baik diucapkan terimakasih.</td>
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
