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
	  
		  
					$totpus0206 =pg_query($koneksi, "select sum(pus) as totjlhpus0206 from keluarga where kodekel='0206'");
						$jlhtotpus0206=pg_fetch_array($totpus0206); 
						$jumlahpus0206=$jlhtotpus0206[totjlhpus0206];
						$totjumlahpus0206=number_format($jumlahpus0206,0,",",".");
					echo "$totjumlahpus0206";
 } ?>