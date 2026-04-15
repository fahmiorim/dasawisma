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
	  
		  
					$totpus0405 =pg_query($koneksi, "select sum(pus) as totjlhpus0405 from keluarga where kodekel='0405'");
						$jlhtotpus0405=pg_fetch_array($totpus0405); 
						$jumlahpus0405=$jlhtotpus0405[totjlhpus0405];
						$totjumlahpus0405=number_format($jumlahpus0405,0,",",".");
					echo "$totjumlahpus0405";
 } ?>