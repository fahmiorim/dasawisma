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
	  
		  
			$totmeninggal0404 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0404 from kehamilan where kodekel='0404'");
						$jlhtotmeninggal0404=pg_fetch_array($totmeninggal0404); 
						$jumlahmeninggal0404=$jlhtotmeninggal0404[totjlhmeninggal0404];
						$totjumlahmeninggal0404=number_format($jumlahmeninggal0404,0,",",".");
					echo "$totjumlahmeninggal0404";
 } ?>