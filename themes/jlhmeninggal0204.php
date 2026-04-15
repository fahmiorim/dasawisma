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
	  
		  
			$totmeninggal0204 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0204 from kehamilan where kodekel='0204'");
						$jlhtotmeninggal0204=pg_fetch_array($totmeninggal0204); 
						$jumlahmeninggal0204=$jlhtotmeninggal0204[totjlhmeninggal0204];
						$totjumlahmeninggal0204=number_format($jumlahmeninggal0204,0,",",".");
					echo "$totjumlahmeninggal0204";
 } ?>