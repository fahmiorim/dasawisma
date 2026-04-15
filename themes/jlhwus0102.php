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
	  
		  
					$totwus0102 =pg_query($koneksi, "select sum(wus) as totjlhwus0102 from keluarga where kodekel='0102'");
						$jlhtotwus0102=pg_fetch_array($totwus0102); 
						$jumlahwus0102=$jlhtotwus0102[totjlhwus0102];
						$totjumlahwus0102=number_format($jumlahwus0102,0,",",".");
					echo "$totjumlahwus0102";
 } ?>