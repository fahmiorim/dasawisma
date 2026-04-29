<?php
error_reporting(0);
include "config/koneksi.php";


function anti_injection($data)
{
  $filter  = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
  return $filter;
}
$username = anti_injection($_POST['username']);
$password = anti_injection(md5($_POST['password']));


$query  = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
$login  = pg_query($koneksi, $query);
$ketemu = pg_num_rows($login);
$r      = pg_fetch_array($login);

if ($ketemu > 0) {
  session_start();

  $_SESSION['ses_user']     = $r['username'];
  $_SESSION['ses_nama']     = $r['nama_lengkap'];
  $_SESSION['ses_password'] = $r['password'];
  $_SESSION['ses_id']       = $r['id_sesi'];
  $_SESSION['ses_foto']       = $r['foto'];
  $_SESSION['ses_level']    = $r['level'];
  $_SESSION['ses_kodekel']    = $r['kodekel'];
  $_SESSION['ses_kodekec']    = $r['kodekec'];
  $_SESSION['ses_namakel']    = $r['namakel'];
  $_SESSION['ses_namakec']    = $r['namakec'];
  $_SESSION['nik']    = $r['nik'];
  $_SESSION['thnaktif']    = $_POST['tahunaktif'];
  session_regenerate_id();
  $sid_baru = session_id();
  pg_query($koneksi, "UPDATE users SET id_sesi='$sid_baru' WHERE username='$username'");


  header('location:appmaster.php?module=beranda');
} else {
  echo "<script>alert('Username Atau Password Anda Salah'); window.location = 'index.php'</script>";
}
