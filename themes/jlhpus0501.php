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
	  
		  
					$totpus0501 =pg_query($koneksi, "select sum(pus) as totjlhpus0501 from keluarga where kodekel='0501'");
						$jlhtotpus0501=pg_fetch_array($totpus0501); 
						$jumlahpus0501=$jlhtotpus0501[totjlhpus0501];
						$totjumlahpus0501=number_format($jumlahpus0501,0,",",".");
					echo "$totjumlahpus0501";
 } ?>