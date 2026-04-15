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
	  
		  
					$totkk0106 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0106 from keluarga where kodekel='0106'");
						$jlhtotkk0106=pg_fetch_array($totkk0106); 
						$jumlahkk0106=$jlhtotkk0106[totjlhkk0106];
						$totjumlahkk0106=number_format($jumlahkk0106,0,",",".");
					echo "$totjumlahkk0106";
 } ?>