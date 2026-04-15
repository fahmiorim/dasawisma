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
	  
		  
					$totpus0407 =pg_query($koneksi, "select sum(pus) as totjlhpus0407 from keluarga where kodekel='0407'");
						$jlhtotpus0407=pg_fetch_array($totpus0407); 
						$jumlahpus0407=$jlhtotpus0407[totjlhpus0407];
						$totjumlahpus0407=number_format($jumlahpus0407,0,",",".");
					echo "$totjumlahpus0407";
 } ?>