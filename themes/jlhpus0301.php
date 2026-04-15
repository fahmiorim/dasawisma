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
	  
		  
					$totpus0301 =pg_query($koneksi, "select sum(pus) as totjlhpus0301 from keluarga where kodekel='0301'");
						$jlhtotpus0301=pg_fetch_array($totpus0301); 
						$jumlahpus0301=$jlhtotpus0301[totjlhpus0301];
						$totjumlahpus0301=number_format($jumlahpus0301,0,",",".");
					echo "$totjumlahpus0301";
 } ?>