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
	  
		  
					$totpus0306 =pg_query($koneksi, "select sum(pus) as totjlhpus0306 from keluarga where kodekel='0306'");
						$jlhtotpus0306=pg_fetch_array($totpus0306); 
						$jumlahpus0306=$jlhtotpus0306[totjlhpus0306];
						$totjumlahpus0306=number_format($jumlahpus0306,0,",",".");
					echo "$totjumlahpus0306";
 } ?>