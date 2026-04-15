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
	  
		  
					$totwus0302 =pg_query($koneksi, "select sum(wus) as totjlhwus0302 from keluarga where kodekel='0302'");
						$jlhtotwus0302=pg_fetch_array($totwus0302); 
						$jumlahwus0302=$jlhtotwus0302[totjlhwus0302];
						$totjumlahwus0302=number_format($jumlahwus0302,0,",",".");
					echo "$totjumlahwus0302";
 } ?>