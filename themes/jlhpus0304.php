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
	  
		  
					$totpus0304 =pg_query($koneksi, "select sum(pus) as totjlhpus0304 from keluarga where kodekel='0304'");
						$jlhtotpus0304=pg_fetch_array($totpus0304); 
						$jumlahpus0304=$jlhtotpus0304[totjlhpus0304];
						$totjumlahpus0304=number_format($jumlahpus0304,0,",",".");
					echo "$totjumlahpus0304";
 } ?>