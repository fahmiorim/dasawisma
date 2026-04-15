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
	  
		  
					$totwus0202 =pg_query($koneksi, "select sum(wus) as totjlhwus0202 from keluarga where kodekel='0202'");
						$jlhtotwus0202=pg_fetch_array($totwus0202); 
						$jumlahwus0202=$jlhtotwus0202[totjlhwus0202];
						$totjumlahwus0202=number_format($jumlahwus0202,0,",",".");
					echo "$totjumlahwus0202";
 } ?>