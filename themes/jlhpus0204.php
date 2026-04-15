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
	  
		  
					$totpus0204 =pg_query($koneksi, "select sum(pus) as totjlhpus0204 from keluarga where kodekel='0204'");
						$jlhtotpus0204=pg_fetch_array($totpus0204); 
						$jumlahpus0204=$jlhtotpus0204[totjlhpus0204];
						$totjumlahpus0204=number_format($jumlahpus0204,0,",",".");
					echo "$totjumlahpus0204";
 } ?>