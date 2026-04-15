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
	  
		  
					$totpus0503 =pg_query($koneksi, "select sum(pus) as totjlhpus0503 from keluarga where kodekel='0503'");
						$jlhtotpus0503=pg_fetch_array($totpus0503); 
						$jumlahpus0503=$jlhtotpus0503[totjlhpus0503];
						$totjumlahpus0503=number_format($jumlahpus0503,0,",",".");
					echo "$totjumlahpus0503";
 } ?>