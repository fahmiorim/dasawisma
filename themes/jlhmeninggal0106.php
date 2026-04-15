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
	  
		  
			$totmeninggal0106 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0106 from kehamilan where kodekel='0106'");
						$jlhtotmeninggal0106=pg_fetch_array($totmeninggal0106); 
						$jumlahmeninggal0106=$jlhtotmeninggal0106[totjlhmeninggal0106];
						$totjumlahmeninggal0106=number_format($jumlahmeninggal0106,0,",",".");
					echo "$totjumlahmeninggal0106";
 } ?>