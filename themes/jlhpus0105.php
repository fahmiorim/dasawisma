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
	  
		  
					$totpus0105 =pg_query($koneksi, "select sum(pus) as totjlhpus0105 from keluarga where kodekel='0105'");
						$jlhtotpus0105=pg_fetch_array($totpus0105); 
						$jumlahpus0105=$jlhtotpus0105[totjlhpus0105];
						$totjumlahpus0105=number_format($jumlahpus0105,0,",",".");
					echo "$totjumlahpus0105";
 } ?>