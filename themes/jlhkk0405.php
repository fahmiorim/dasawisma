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
	  
		  
					$totkk0405 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0405 from keluarga where kodekel='0405'");
						$jlhtotkk0405=pg_fetch_array($totkk0405); 
						$jumlahkk0405=$jlhtotkk0405[totjlhkk0405];
						$totjumlahkk0405=number_format($jumlahkk0405,0,",",".");
					echo "$totjumlahkk0405";
 } ?>