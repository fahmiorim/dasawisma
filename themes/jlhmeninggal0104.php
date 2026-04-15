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
	  
		  
			$totmeninggal0104 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0104 from kehamilan where kodekel='0104'");
						$jlhtotmeninggal0104=pg_fetch_array($totmeninggal0104); 
						$jumlahmeninggal0104=$jlhtotmeninggal0104[totjlhmeninggal0104];
						$totjumlahmeninggal0104=number_format($jumlahmeninggal0104,0,",",".");
					echo "$totjumlahmeninggal0104";
 } ?>