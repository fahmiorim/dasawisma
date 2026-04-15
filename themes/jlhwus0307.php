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
	  
		  
					$totwus0307 =pg_query($koneksi, "select sum(wus) as totjlhwus0307 from keluarga where kodekel='0307'");
						$jlhtotwus0307=pg_fetch_array($totwus0307); 
						$jumlahwus0307=$jlhtotwus0307[totjlhwus0307];
						$totjumlahwus0307=number_format($jumlahwus0307,0,",",".");
					echo "$totjumlahwus0307";
 } ?>