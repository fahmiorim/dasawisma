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
	  
		  
					$totpus0504 =pg_query($koneksi, "select sum(pus) as totjlhpus0504 from keluarga where kodekel='0504'");
						$jlhtotpus0504=pg_fetch_array($totpus0504); 
						$jumlahpus0504=$jlhtotpus0504[totjlhpus0504];
						$totjumlahpus0504=number_format($jumlahpus0504,0,",",".");
					echo "$totjumlahpus0504";
 } ?>