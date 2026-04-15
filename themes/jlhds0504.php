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
	  
		  
					$totds0504 =pg_query($koneksi, "select count(kode) as totjlhds0504 from dasawisma where kodekel='0504'");
						$jlhtotds0504=pg_fetch_array($totds0504); 
						$jumlahds0504=$jlhtotds0504[totjlhds0504];
						$totjumlahds0504=number_format($jumlahds0504,0,",",".");
					echo "$totjumlahds0504";
 } ?>