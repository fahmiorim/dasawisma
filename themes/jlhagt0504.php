 <?php 
 error_reporting(0);
 session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../index.php'); 
}
// 
else{
 include "../config/koneksi.php";
 include "../config/fungsi_terbilang.php";
  include "../config/library.php";
	  
		  
					$totagt0504 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0504 from keluarga where kodekel='0504'");
						$jlhtotagt0504=pg_fetch_array($totagt0504); 
						$jumlahagt0504=$jlhtotagt0504[totjlhagt0504];
						$totjumlahagt0504=number_format($jumlahagt0504,0,",",".");
					echo "$totjumlahagt0504";
 } ?>