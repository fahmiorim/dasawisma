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
	  
		  
			$totmeninggal0405 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0405 from kehamilan where kodekel='0405'");
						$jlhtotmeninggal0405=pg_fetch_array($totmeninggal0405); 
						$jumlahmeninggal0405=$jlhtotmeninggal0405[totjlhmeninggal0405];
						$totjumlahmeninggal0405=number_format($jumlahmeninggal0405,0,",",".");
					echo "$totjumlahmeninggal0405";
 } ?>