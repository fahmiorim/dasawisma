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
	  
		  
			$totmeninggal0302 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0302 from kehamilan where kodekel='0302'");
						$jlhtotmeninggal0302=pg_fetch_array($totmeninggal0302); 
						$jumlahmeninggal0302=$jlhtotmeninggal0302[totjlhmeninggal0302];
						$totjumlahmeninggal0302=number_format($jumlahmeninggal0302,0,",",".");
					echo "$totjumlahmeninggal0302";
 } ?>