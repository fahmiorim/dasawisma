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
	  
		  
					$totwus0101 =pg_query($koneksi, "select sum(wus) as totjlhwus0101 from keluarga where kodekel='0101'");
						$jlhtotwus0101=pg_fetch_array($totwus0101); 
						$jumlahwus0101=$jlhtotwus0101[totjlhwus0101];
						$totjumlahwus0101=number_format($jumlahwus0101,0,",",".");
					echo "$totjumlahwus0101";
 } ?>