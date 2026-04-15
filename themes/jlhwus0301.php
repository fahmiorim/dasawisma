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
	  
		  
					$totwus0301 =pg_query($koneksi, "select sum(wus) as totjlhwus0301 from keluarga where kodekel='0301'");
						$jlhtotwus0301=pg_fetch_array($totwus0301); 
						$jumlahwus0301=$jlhtotwus0301[totjlhwus0301];
						$totjumlahwus0301=number_format($jumlahwus0301,0,",",".");
					echo "$totjumlahwus0301";
 } ?>