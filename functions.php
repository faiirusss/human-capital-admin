<?php

$conn = mysqli_connect("localhost", "root", "", "len_malen");

function query($query)
{
  global $conn;
  $rows = array();

  $result = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// crud
// create => insert data
function create($data)
{
  global $conn;

  $nama = $data["nama"];
  $nim = $data["nim"];
  $domisili = $data["domisili"];
  $telepon = $data["telepon"];
  $email = $data["email"];
  $presensi = $data["presensi"];
  $unitkerja = $data["unitkerja"];
  $asalinstansi = $data["instansi"];
  $jurusan = $data["jurusan"];
  $pembimbing = $data["pembimbing"];
  $awalPeriode = $data["awalperiode"];
  $akhirPeriode = $data["akhirperiode"];

  $query = "INSERT INTO peserta VALUES
    ('', 
    '$nama', 
    '$nim',
    '$domisili',
    '$telepon',
    '$presensi',  
    '$unitkerja',  
    '$asalinstansi', 
    '$jurusan', 
    '$pembimbing',
    '$email',
    '$awalPeriode',
    '$akhirPeriode')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// delete
function delete($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM peserta WHERE id = $id");
  return mysqli_affected_rows($conn);
}

// update
function update($data)
{
  global $conn;

  $id = $data["id"];
  $presensi = $data["presensi"];
  $nama = $data["nama"];
  $nim = $data["nim"];
  $domisili = $data["domisili"];
  $telepon = $data["telepon"];
  $email = $data["email"];
  $unitkerja = $data["unitkerja"];
  $asalinstansi = $data["instansi"];
  $jurusan = $data["jurusan"];
  $pembimbing = $data["pembimbing"];
  $awalPeriode = $data["awalperiode"];
  $akhirPeriode = $data["akhirperiode"];

  $query = "UPDATE peserta SET
    nama = '$nama',
    nim = '$nim',
    domisili = '$domisili',
    telepon = '$telepon',
    presensi = '$presensi',
    unitkerja = '$unitkerja',
    instansi = '$asalinstansi',
    jurusan = '$jurusan',
    pembimbing = '$pembimbing',
    email = '$email',
    awal_periode = '$awalPeriode',
    akhir_periode = '$akhirPeriode'
    WHERE id = $id";

  mysqli_query($conn, $query);
  
  return mysqli_affected_rows($conn);
}

function setoran($data)
{
  global $conn;
  $id_peserta = $_GET["id"];

  $hafalan_surat = $data["hafalansurat"];
  $niatsolat = $data["niatsolat"];
  $iftitah = $data["iftitah"];
  $rukuk = $data["rukuk"];
  $itidal = $data["itidal"];
  $sujud = $data["sujud"];
  $duduk2sujud = $data["duduksujud"];
  $tahiyat = $data["tahiyat"];
  $pancasila = $data["pancasila"];
  $uud = $data["uud"];
  $laguwajib = $data["laguwajib"];

  $checking = "SELECT peserta_id FROM setoran WHERE peserta_id = '$id_peserta'";
  $result = mysqli_query($conn, $checking);

  if (mysqli_num_rows($result) == 0) {
    $query = "INSERT INTO setoran VALUES
      ('', '$id_peserta', '$hafalan_surat', '$niatsolat', '$iftitah', '$rukuk', '$itidal', '$sujud', '$duduk2sujud', '$tahiyat', '$pancasila', '$uud', '$laguwajib')";
  } else {
    $query = "UPDATE setoran SET
      hafalan_surat = '$hafalan_surat',
      niatsolat = '$niatsolat',
      iftitah = '$iftitah',
      rukuk = '$rukuk',
      itidal = '$itidal',
      sujud = '$sujud',
      duduk2sujud = '$duduk2sujud',
      tahiyat = '$tahiyat',
      pancasila = '$pancasila',
      uud = '$uud',
      laguwajib = '$laguwajib'
      WHERE peserta_id = $id_peserta";
  }

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


// penilaian magang

function penilaian($data)
{
  global $conn;

  $peserta_id = $_GET["id"];
  $penugasan = $data["penugasan"];
  $memecahkan_masalah = $data["memecahkan_masalah"];
  $keterampilan_teknis = $data["keterampilan_teknis"];
  $kualitas_kerja = $data["kualitas_kerja"];
  $ketepatan_waktu = $data["ketepatan_waktu"];
  $kejujuran = $data["kejujuran"];
  $kedisiplinan = $data["kedisiplinan"];
  $tanggung_jawab = $data["tanggung_jawab"];
  $motivasi = $data["motivasi"];
  $inisiatif = $data["inisiatif"];
  $kerjasama_tim = $data["kerjasama_tim"];
  $interaksi_sosial = $data["interaksi_sosial"];

  $checking = "SELECT peserta_id FROM penilaian WHERE peserta_id = '$peserta_id'";
  $result = mysqli_query($conn, $checking);

  if (mysqli_num_rows($result) == 0) {
    $query = "INSERT INTO penilaian VALUES
      ('', 
      '$peserta_id', 
      '$penugasan', 
      '$memecahkan_masalah', 
      '$keterampilan_teknis', 
      '$kualitas_kerja', 
      '$ketepatan_waktu', 
      '$kejujuran', 
      '$kedisiplinan', 
      '$tanggung_jawab', 
      '$motivasi', 
      '$inisiatif', 
      '$kerjasama_tim', 
      '$interaksi_sosial')
      ";
  }

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}