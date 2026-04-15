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
	  
		  
			$totmeninggal0301 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0301 from kehamilan where kodekel='0301'");
						$jlhtotmeninggal0301=pg_fetch_array($totmeninggal0301); 
						$jumlahmeninggal0301=$jlhtotmeninggal0301[totjlhmeninggal0301];
						$totjumlahmeninggal0301=number_format($jumlahmeninggal0301,0,",",".");
					echo "$totjumlahmeninggal0301";
 } ?>