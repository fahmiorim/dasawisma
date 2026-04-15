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
	  
		  
			$totmeninggal0504 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0504 from kehamilan where kodekel='0504'");
						$jlhtotmeninggal0504=pg_fetch_array($totmeninggal0504); 
						$jumlahmeninggal0504=$jlhtotmeninggal0504[totjlhmeninggal0504];
						$totjumlahmeninggal0504=number_format($jumlahmeninggal0504,0,",",".");
					echo "$totjumlahmeninggal0504";
 } ?>