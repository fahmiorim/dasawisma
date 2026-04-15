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
	  
		  
					$totpus0104 =pg_query($koneksi, "select sum(pus) as totjlhpus0104 from keluarga where kodekel='0104'");
						$jlhtotpus0104=pg_fetch_array($totpus0104); 
						$jumlahpus0104=$jlhtotpus0104[totjlhpus0104];
						$totjumlahpus0104=number_format($jumlahpus0104,0,",",".");
					echo "$totjumlahpus0104";
 } ?>