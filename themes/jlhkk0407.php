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
	  
		  
					$totkk0407 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0407 from keluarga where kodekel='0407'");
						$jlhtotkk0407=pg_fetch_array($totkk0407); 
						$jumlahkk0407=$jlhtotkk0407[totjlhkk0407];
						$totjumlahkk0407=number_format($jumlahkk0407,0,",",".");
					echo "$totjumlahkk0407";
 } ?>