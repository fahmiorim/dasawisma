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
	  
		  
					$totpus0207 =pg_query($koneksi, "select sum(pus) as totjlhpus0207 from keluarga where kodekel='0207'");
						$jlhtotpus0207=pg_fetch_array($totpus0207); 
						$jumlahpus0207=$jlhtotpus0207[totjlhpus0207];
						$totjumlahpus0207=number_format($jumlahpus0207,0,",",".");
					echo "$totjumlahpus0207";
 } ?>