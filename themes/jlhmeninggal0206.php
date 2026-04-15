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
	  
		  
			$totmeninggal0206 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0206 from kehamilan where kodekel='0206'");
						$jlhtotmeninggal0206=pg_fetch_array($totmeninggal0206); 
						$jumlahmeninggal0206=$jlhtotmeninggal0206[totjlhmeninggal0206];
						$totjumlahmeninggal0206=number_format($jumlahmeninggal0206,0,",",".");
					echo "$totjumlahmeninggal0206";
 } ?>