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
	  
		  
			$totmeninggal0503 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0503 from kehamilan where kodekel='0503'");
						$jlhtotmeninggal0503=pg_fetch_array($totmeninggal0503); 
						$jumlahmeninggal0503=$jlhtotmeninggal0503[totjlhmeninggal0503];
						$totjumlahmeninggal0503=number_format($jumlahmeninggal0503,0,",",".");
					echo "$totjumlahmeninggal0503";
 } ?>