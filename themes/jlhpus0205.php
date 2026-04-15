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
	  
		  
					$totpus0205 =pg_query($koneksi, "select sum(pus) as totjlhpus0205 from keluarga where kodekel='0205'");
						$jlhtotpus0205=pg_fetch_array($totpus0205); 
						$jumlahpus0205=$jlhtotpus0205[totjlhpus0205];
						$totjumlahpus0205=number_format($jumlahpus0205,0,",",".");
					echo "$totjumlahpus0205";
 } ?>