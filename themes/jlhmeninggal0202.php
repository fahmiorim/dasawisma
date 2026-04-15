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
	  
		  
			$totmeninggal0202 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0202 from kehamilan where kodekel='0202'");
						$jlhtotmeninggal0202=pg_fetch_array($totmeninggal0202); 
						$jumlahmeninggal0202=$jlhtotmeninggal0202[totjlhmeninggal0202];
						$totjumlahmeninggal0202=number_format($jumlahmeninggal0202,0,",",".");
					echo "$totjumlahmeninggal0202";
 } ?>