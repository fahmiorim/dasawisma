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
	  
		  
					$totkk0203 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0203 from keluarga where kodekel='0203'");
						$jlhtotkk0203=pg_fetch_array($totkk0203); 
						$jumlahkk0203=$jlhtotkk0203[totjlhkk0203];
						$totjumlahkk0203=number_format($jumlahkk0203,0,",",".");
					echo "$totjumlahkk0203";
 } ?>