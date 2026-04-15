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
	  
		  
					$totpus0102 =pg_query($koneksi, "select sum(pus) as totjlhpus0102 from keluarga where kodekel='0102'");
						$jlhtotpus0102=pg_fetch_array($totpus0102); 
						$jumlahpus0102=$jlhtotpus0102[totjlhpus0102];
						$totjumlahpus0102=number_format($jumlahpus0102,0,",",".");
					echo "$totjumlahpus0102";
 } ?>