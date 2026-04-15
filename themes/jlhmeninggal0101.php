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
	  
		  
					$totmeninggal0101 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0101 from kehamilan where kodekel='0101'");
						$jlhtotmeninggal0101=pg_fetch_array($totmeninggal0101); 
						$jumlahmeninggal0101=$jlhtotmeninggal0101[totjlhmeninggal0101];
						$totjumlahmeninggal0101=number_format($jumlahmeninggal0101,0,",",".");
					echo "$totjumlahmeninggal0101";
 } ?>