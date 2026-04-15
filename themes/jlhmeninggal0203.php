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
	  
		  
			$totmeninggal0203 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0203 from kehamilan where kodekel='0203'");
						$jlhtotmeninggal0203=pg_fetch_array($totmeninggal0203); 
						$jumlahmeninggal0203=$jlhtotmeninggal0203[totjlhmeninggal0203];
						$totjumlahmeninggal0203=number_format($jumlahmeninggal0203,0,",",".");
					echo "$totjumlahmeninggal0203";
 } ?>