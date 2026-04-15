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
	  
		  
					$totpus0106 =pg_query($koneksi, "select sum(pus) as totjlhpus0106 from keluarga where kodekel='0106'");
						$jlhtotpus0106=pg_fetch_array($totpus0106); 
						$jumlahpus0106=$jlhtotpus0106[totjlhpus0106];
						$totjumlahpus0106=number_format($jumlahpus0106,0,",",".");
					echo "$totjumlahpus0106";
 } ?>