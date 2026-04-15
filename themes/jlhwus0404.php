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
	  
		  
					$totwus0404 =pg_query($koneksi, "select sum(wus) as totjlhwus0404 from keluarga where kodekel='0404'");
						$jlhtotwus0404=pg_fetch_array($totwus0404); 
						$jumlahwus0404=$jlhtotwus0404[totjlhwus0404];
						$totjumlahwus0404=number_format($jumlahwus0404,0,",",".");
					echo "$totjumlahwus0404";
 } ?>