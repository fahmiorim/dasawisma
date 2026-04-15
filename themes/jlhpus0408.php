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
	  
		  
					$totpus0408 =pg_query($koneksi, "select sum(pus) as totjlhpus0408 from keluarga where kodekel='0408'");
						$jlhtotpus0408=pg_fetch_array($totpus0408); 
						$jumlahpus0408=$jlhtotpus0408[totjlhpus0408];
						$totjumlahpus0408=number_format($jumlahpus0408,0,",",".");
					echo "$totjumlahpus0408";
 } ?>