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
	  
		  
					$totkk0503 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0503 from keluarga where kodekel='0503'");
						$jlhtotkk0503=pg_fetch_array($totkk0503); 
						$jumlahkk0503=$jlhtotkk0503[totjlhkk0503];
						$totjumlahkk0503=number_format($jumlahkk0503,0,",",".");
					echo "$totjumlahkk0503";
 } ?>