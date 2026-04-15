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
	  
		  
					$totwus0408 =pg_query($koneksi, "select sum(wus) as totjlhwus0408 from keluarga where kodekel='0408'");
						$jlhtotwus0408=pg_fetch_array($totwus0408); 
						$jumlahwus0408=$jlhtotwus0408[totjlhwus0408];
						$totjumlahwus0408=number_format($jumlahwus0408,0,",",".");
					echo "$totjumlahwus0408";
 } ?>