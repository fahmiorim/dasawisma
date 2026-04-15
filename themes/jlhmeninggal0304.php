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
	  
		  
			$totmeninggal0304 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0304 from kehamilan where kodekel='0304'");
						$jlhtotmeninggal0304=pg_fetch_array($totmeninggal0304); 
						$jumlahmeninggal0304=$jlhtotmeninggal0304[totjlhmeninggal0304];
						$totjumlahmeninggal0304=number_format($jumlahmeninggal0304,0,",",".");
					echo "$totjumlahmeninggal0304";
 } ?>