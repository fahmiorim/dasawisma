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
	  
		  
					$totpus0507 =pg_query($koneksi, "select sum(pus) as totjlhpus0507 from keluarga where kodekel='0507'");
						$jlhtotpus0507=pg_fetch_array($totpus0507); 
						$jumlahpus0507=$jlhtotpus0507[totjlhpus0507];
						$totjumlahpus0507=number_format($jumlahpus0507,0,",",".");
					echo "$totjumlahpus0507";
 } ?>