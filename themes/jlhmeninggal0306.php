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
	  
		  
			$totmeninggal0306 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0306 from kehamilan where kodekel='0306'");
						$jlhtotmeninggal0306=pg_fetch_array($totmeninggal0306); 
						$jumlahmeninggal0306=$jlhtotmeninggal0306[totjlhmeninggal0306];
						$totjumlahmeninggal0306=number_format($jumlahmeninggal0306,0,",",".");
					echo "$totjumlahmeninggal0306";
 } ?>