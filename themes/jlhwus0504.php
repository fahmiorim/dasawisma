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
	  
		  
					$totwus0504 =pg_query($koneksi, "select sum(wus) as totjlhwus0504 from keluarga where kodekel='0504'");
						$jlhtotwus0504=pg_fetch_array($totwus0504); 
						$jumlahwus0504=$jlhtotwus0504[totjlhwus0504];
						$totjumlahwus0504=number_format($jumlahwus0504,0,",",".");
					echo "$totjumlahwus0504";
 } ?>