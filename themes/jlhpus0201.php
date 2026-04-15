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
	  
		  
					$totpus0201 =pg_query($koneksi, "select sum(pus) as totjlhpus0201 from keluarga where kodekel='0201'");
						$jlhtotpus0201=pg_fetch_array($totpus0201); 
						$jumlahpus0201=$jlhtotpus0201[totjlhpus0201];
						$totjumlahpus0201=number_format($jumlahpus0201,0,",",".");
					echo "$totjumlahpus0201";
 } ?>