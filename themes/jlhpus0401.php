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
	  
		  
					$totpus0401 =pg_query($koneksi, "select sum(pus) as totjlhpus0401 from keluarga where kodekel='0401'");
						$jlhtotpus0401=pg_fetch_array($totpus0401); 
						$jumlahpus0401=$jlhtotpus0401[totjlhpus0401];
						$totjumlahpus0401=number_format($jumlahpus0401,0,",",".");
					echo "$totjumlahpus0401";
 } ?>