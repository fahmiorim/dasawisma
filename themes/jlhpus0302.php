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
	  
		  
					$totpus0302 =pg_query($koneksi, "select sum(pus) as totjlhpus0302 from keluarga where kodekel='0302'");
						$jlhtotpus0302=pg_fetch_array($totpus0302); 
						$jumlahpus0302=$jlhtotpus0302[totjlhpus0302];
						$totjumlahpus0302=number_format($jumlahpus0302,0,",",".");
					echo "$totjumlahpus0302";
 } ?>