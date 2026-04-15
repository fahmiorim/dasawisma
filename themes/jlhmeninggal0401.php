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
	  
		  
			$totmeninggal0401 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0401 from kehamilan where kodekel='0401'");
						$jlhtotmeninggal0401=pg_fetch_array($totmeninggal0401); 
						$jumlahmeninggal0401=$jlhtotmeninggal0401[totjlhmeninggal0401];
						$totjumlahmeninggal0401=number_format($jumlahmeninggal0401,0,",",".");
					echo "$totjumlahmeninggal0401";
 } ?>