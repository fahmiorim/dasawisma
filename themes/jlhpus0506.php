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
	  
		  
					$totpus0506 =pg_query($koneksi, "select sum(pus) as totjlhpus0506 from keluarga where kodekel='0506'");
						$jlhtotpus0506=pg_fetch_array($totpus0506); 
						$jumlahpus0506=$jlhtotpus0506[totjlhpus0506];
						$totjumlahpus0506=number_format($jumlahpus0506,0,",",".");
					echo "$totjumlahpus0506";
 } ?>