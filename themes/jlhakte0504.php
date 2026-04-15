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
	  
		  
			$totakte0504 =pg_query($koneksi, "select count(akte) as totjlhakte0504 from kehamilan where kodekel='0504'");
						$jlhtotakte0504=pg_fetch_array($totakte0504); 
						$jumlahakte0504=$jlhtotakte0504[totjlhakte0504];
						$totjumlahakte0504=number_format($jumlahakte0504,0,",",".");
					echo "$totjumlahakte0504";
 } ?>