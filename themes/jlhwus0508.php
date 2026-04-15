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
	  
		  
					$totwus0508 =pg_query($koneksi, "select sum(wus) as totjlhwus0508 from keluarga where kodekel='0508'");
						$jlhtotwus0508=pg_fetch_array($totwus0508); 
						$jumlahwus0508=$jlhtotwus0508[totjlhwus0508];
						$totjumlahwus0508=number_format($jumlahwus0508,0,",",".");
					echo "$totjumlahwus0508";
 } ?>