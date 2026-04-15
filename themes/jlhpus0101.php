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
	  
		  
					$totpus0101 =pg_query($koneksi, "select sum(pus) as totjlhpus0101 from keluarga where kodekel='0101'");
						$jlhtotpus0101=pg_fetch_array($totpus0101); 
						$jumlahpus0101=$jlhtotpus0101[totjlhpus0101];
						$totjumlahpus0101=number_format($jumlahpus0101,0,",",".");
					echo "$totjumlahpus0101";
 } ?>