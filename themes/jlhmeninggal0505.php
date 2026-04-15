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
	  
		  
			$totmeninggal0505 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0505 from kehamilan where kodekel='0505'");
						$jlhtotmeninggal0505=pg_fetch_array($totmeninggal0505); 
						$jumlahmeninggal0505=$jlhtotmeninggal0505[totjlhmeninggal0505];
						$totjumlahmeninggal0505=number_format($jumlahmeninggal0505,0,",",".");
					echo "$totjumlahmeninggal0505";
 } ?>