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
	  
		  
			$totmeninggal0507 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0507 from kehamilan where kodekel='0507'");
						$jlhtotmeninggal0507=pg_fetch_array($totmeninggal0507); 
						$jumlahmeninggal0507=$jlhtotmeninggal0507[totjlhmeninggal0507];
						$totjumlahmeninggal0507=number_format($jumlahmeninggal0507,0,",",".");
					echo "$totjumlahmeninggal0507";
 } ?>