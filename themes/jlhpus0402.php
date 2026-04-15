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
	  
		  
					$totpus0402 =pg_query($koneksi, "select sum(pus) as totjlhpus0402 from keluarga where kodekel='0402'");
						$jlhtotpus0402=pg_fetch_array($totpus0402); 
						$jumlahpus0402=$jlhtotpus0402[totjlhpus0402];
						$totjumlahpus0402=number_format($jumlahpus0402,0,",",".");
					echo "$totjumlahpus0402";
 } ?>