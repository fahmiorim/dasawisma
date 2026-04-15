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
	  
		  
					$totwus0407 =pg_query($koneksi, "select sum(wus) as totjlhwus0407 from keluarga where kodekel='0407'");
						$jlhtotwus0407=pg_fetch_array($totwus0407); 
						$jumlahwus0407=$jlhtotwus0407[totjlhwus0407];
						$totjumlahwus0407=number_format($jumlahwus0407,0,",",".");
					echo "$totjumlahwus0407";
 } ?>