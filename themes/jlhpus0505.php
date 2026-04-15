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
	  
		  
					$totpus0505 =pg_query($koneksi, "select sum(pus) as totjlhpus0505 from keluarga where kodekel='0505'");
						$jlhtotpus0505=pg_fetch_array($totpus0505); 
						$jumlahpus0505=$jlhtotpus0505[totjlhpus0505];
						$totjumlahpus0505=number_format($jumlahpus0505,0,",",".");
					echo "$totjumlahpus0505";
 } ?>