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
	  
		  
			$totmeninggal0408 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0408 from kehamilan where kodekel='0408'");
						$jlhtotmeninggal0408=pg_fetch_array($totmeninggal0408); 
						$jumlahmeninggal0408=$jlhtotmeninggal0408[totjlhmeninggal0408];
						$totjumlahmeninggal0408=number_format($jumlahmeninggal0408,0,",",".");
					echo "$totjumlahmeninggal0408";
 } ?>