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
	  
		  
			$totmeninggal0501 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0501 from kehamilan where kodekel='0501'");
						$jlhtotmeninggal0501=pg_fetch_array($totmeninggal0501); 
						$jumlahmeninggal0501=$jlhtotmeninggal0501[totjlhmeninggal0501];
						$totjumlahmeninggal0501=number_format($jumlahmeninggal0501,0,",",".");
					echo "$totjumlahmeninggal0501";
 } ?>