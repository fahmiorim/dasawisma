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
	  
		  
			$totmeninggal0506 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0506 from kehamilan where kodekel='0506'");
						$jlhtotmeninggal0506=pg_fetch_array($totmeninggal0506); 
						$jumlahmeninggal0506=$jlhtotmeninggal0506[totjlhmeninggal0506];
						$totjumlahmeninggal0506=number_format($jumlahmeninggal0506,0,",",".");
					echo "$totjumlahmeninggal0506";
 } ?>