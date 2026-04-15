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
	  
		  
					$totpus0409 =pg_query($koneksi, "select sum(pus) as totjlhpus0409 from keluarga where kodekel='0409'");
						$jlhtotpus0409=pg_fetch_array($totpus0409); 
						$jumlahpus0409=$jlhtotpus0409[totjlhpus0409];
						$totjumlahpus0409=number_format($jumlahpus0409,0,",",".");
					echo "$totjumlahpus0409";
 } ?>