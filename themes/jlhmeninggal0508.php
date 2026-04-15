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
	  
		  
			$totmeninggal0508 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0508 from kehamilan where kodekel='0508'");
						$jlhtotmeninggal0508=pg_fetch_array($totmeninggal0508); 
						$jumlahmeninggal0508=$jlhtotmeninggal0508[totjlhmeninggal0508];
						$totjumlahmeninggal0508=number_format($jumlahmeninggal0508,0,",",".");
					echo "$totjumlahmeninggal0508";
 } ?>