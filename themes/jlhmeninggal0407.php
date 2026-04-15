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
	  
		  
			$totmeninggal0407 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0407 from kehamilan where kodekel='0407'");
						$jlhtotmeninggal0407=pg_fetch_array($totmeninggal0407); 
						$jumlahmeninggal0407=$jlhtotmeninggal0407[totjlhmeninggal0407];
						$totjumlahmeninggal0407=number_format($jumlahmeninggal0407,0,",",".");
					echo "$totjumlahmeninggal0407";
 } ?>