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
	  
		  
					$totpus0406 =pg_query($koneksi, "select sum(pus) as totjlhpus0406 from keluarga where kodekel='0406'");
						$jlhtotpus0406=pg_fetch_array($totpus0406); 
						$jumlahpus0406=$jlhtotpus0406[totjlhpus0406];
						$totjumlahpus0406=number_format($jumlahpus0406,0,",",".");
					echo "$totjumlahpus0406";
 } ?>