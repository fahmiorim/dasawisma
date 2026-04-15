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
	  
		  
					$totkk0401 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0401 from keluarga where kodekel='0401'");
						$jlhtotkk0401=pg_fetch_array($totkk0401); 
						$jumlahkk0401=$jlhtotkk0401[totjlhkk0401];
						$totjumlahkk0401=number_format($jumlahkk0401,0,",",".");
					echo "$totjumlahkk0401";
 } ?>