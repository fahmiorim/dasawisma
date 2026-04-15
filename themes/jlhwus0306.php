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
	  
		  
					$totwus0306 =pg_query($koneksi, "select sum(wus) as totjlhwus0306 from keluarga where kodekel='0306'");
						$jlhtotwus0306=pg_fetch_array($totwus0306); 
						$jumlahwus0306=$jlhtotwus0306[totjlhwus0306];
						$totjumlahwus0306=number_format($jumlahwus0306,0,",",".");
					echo "$totjumlahwus0306";
 } ?>