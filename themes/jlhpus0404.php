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
	  
		  
					$totpus0404 =pg_query($koneksi, "select sum(pus) as totjlhpus0404 from keluarga where kodekel='0404'");
						$jlhtotpus0404=pg_fetch_array($totpus0404); 
						$jumlahpus0404=$jlhtotpus0404[totjlhpus0404];
						$totjumlahpus0404=number_format($jumlahpus0404,0,",",".");
					echo "$totjumlahpus0404";
 } ?>