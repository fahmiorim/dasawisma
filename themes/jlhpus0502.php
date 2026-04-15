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
	  
		  
					$totpus0502 =pg_query($koneksi, "select sum(pus) as totjlhpus0502 from keluarga where kodekel='0502'");
						$jlhtotpus0502=pg_fetch_array($totpus0502); 
						$jumlahpus0502=$jlhtotpus0502[totjlhpus0502];
						$totjumlahpus0502=number_format($jumlahpus0502,0,",",".");
					echo "$totjumlahpus0502";
 } ?>