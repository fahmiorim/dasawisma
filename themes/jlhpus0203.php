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
	  
		  
					$totpus0203 =pg_query($koneksi, "select sum(pus) as totjlhpus0203 from keluarga where kodekel='0203'");
						$jlhtotpus0203=pg_fetch_array($totpus0203); 
						$jumlahpus0203=$jlhtotpus0203[totjlhpus0203];
						$totjumlahpus0203=number_format($jumlahpus0203,0,",",".");
					echo "$totjumlahpus0203";
 } ?>