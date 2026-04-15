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
	  
		  
			$totmeninggal0307 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0307 from kehamilan where kodekel='0307'");
						$jlhtotmeninggal0307=pg_fetch_array($totmeninggal0307); 
						$jumlahmeninggal0307=$jlhtotmeninggal0307[totjlhmeninggal0307];
						$totjumlahmeninggal0307=number_format($jumlahmeninggal0307,0,",",".");
					echo "$totjumlahmeninggal0307";
 } ?>