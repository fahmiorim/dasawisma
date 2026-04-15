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
	  
		  
					$totpus0303 =pg_query($koneksi, "select sum(pus) as totjlhpus0303 from keluarga where kodekel='0303'");
						$jlhtotpus0303=pg_fetch_array($totpus0303); 
						$jumlahpus0303=$jlhtotpus0303[totjlhpus0303];
						$totjumlahpus0303=number_format($jumlahpus0303,0,",",".");
					echo "$totjumlahpus0303";
 } ?>