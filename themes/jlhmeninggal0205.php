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
	  
		  
			$totmeninggal0205 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0205 from kehamilan where kodekel='0205'");
						$jlhtotmeninggal0205=pg_fetch_array($totmeninggal0205); 
						$jumlahmeninggal0205=$jlhtotmeninggal0205[totjlhmeninggal0205];
						$totjumlahmeninggal0205=number_format($jumlahmeninggal0205,0,",",".");
					echo "$totjumlahmeninggal0205";
 } ?>