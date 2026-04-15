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
	  
		  
					$totkk0505 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0505 from keluarga where kodekel='0505'");
						$jlhtotkk0505=pg_fetch_array($totkk0505); 
						$jumlahkk0505=$jlhtotkk0505[totjlhkk0505];
						$totjumlahkk0505=number_format($jumlahkk0505,0,",",".");
					echo "$totjumlahkk0505";
 } ?>