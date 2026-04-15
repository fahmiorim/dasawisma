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
	  
		  
					$totwus0403 =pg_query($koneksi, "select sum(wus) as totjlhwus0403 from keluarga where kodekel='0403'");
						$jlhtotwus0403=pg_fetch_array($totwus0403); 
						$jumlahwus0403=$jlhtotwus0403[totjlhwus0403];
						$totjumlahwus0403=number_format($jumlahwus0403,0,",",".");
					echo "$totjumlahwus0403";
 } ?>