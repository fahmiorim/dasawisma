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
	  
		  
					$totpus0508 =pg_query($koneksi, "select sum(pus) as totjlhpus0508 from keluarga where kodekel='0508'");
						$jlhtotpus0508=pg_fetch_array($totpus0508); 
						$jumlahpus0508=$jlhtotpus0508[totjlhpus0508];
						$totjumlahpus0508=number_format($jumlahpus0508,0,",",".");
					echo "$totjumlahpus0508";
 } ?>