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
	  
		  
			$totmeninggal0403 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0403 from kehamilan where kodekel='0403'");
						$jlhtotmeninggal0403=pg_fetch_array($totmeninggal0403); 
						$jumlahmeninggal0403=$jlhtotmeninggal0403[totjlhmeninggal0403];
						$totjumlahmeninggal0403=number_format($jumlahmeninggal0403,0,",",".");
					echo "$totjumlahmeninggal0403";
 } ?>