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
	  
		  
			$totmeninggal0102 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0102 from kehamilan where kodekel='0102'");
						$jlhtotmeninggal0102=pg_fetch_array($totmeninggal0102); 
						$jumlahmeninggal0102=$jlhtotmeninggal0102[totjlhmeninggal0102];
						$totjumlahmeninggal0102=number_format($jumlahmeninggal0102,0,",",".");
					echo "$totjumlahmeninggal0102";
 } ?>