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
	  
		  
					$totkk0408 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0408 from keluarga where kodekel='0408'");
						$jlhtotkk0408=pg_fetch_array($totkk0408); 
						$jumlahkk0408=$jlhtotkk0408[totjlhkk0408];
						$totjumlahkk0408=number_format($jumlahkk0408,0,",",".");
					echo "$totjumlahkk0408";
 } ?>