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
	  
		  
					$totpus0403 =pg_query($koneksi, "select sum(pus) as totjlhpus0403 from keluarga where kodekel='0403'");
						$jlhtotpus0403=pg_fetch_array($totpus0403); 
						$jumlahpus0403=$jlhtotpus0403[totjlhpus0403];
						$totjumlahpus0403=number_format($jumlahpus0403,0,",",".");
					echo "$totjumlahpus0403";
 } ?>