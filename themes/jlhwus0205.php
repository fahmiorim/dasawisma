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
	  
		  
					$totwus0205 =pg_query($koneksi, "select sum(wus) as totjlhwus0205 from keluarga where kodekel='0205'");
						$jlhtotwus0205=pg_fetch_array($totwus0205); 
						$jumlahwus0205=$jlhtotwus0205[totjlhwus0205];
						$totjumlahwus0205=number_format($jumlahwus0205,0,",",".");
					echo "$totjumlahwus0205";
 } ?>