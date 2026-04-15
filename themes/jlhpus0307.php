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
	  
		  
					$totpus0307 =pg_query($koneksi, "select sum(pus) as totjlhpus0307 from keluarga where kodekel='0307'");
						$jlhtotpus0307=pg_fetch_array($totpus0307); 
						$jumlahpus0307=$jlhtotpus0307[totjlhpus0307];
						$totjumlahpus0307=number_format($jumlahpus0307,0,",",".");
					echo "$totjumlahpus0307";
 } ?>