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
	  
		  
					$totpus0103 =pg_query($koneksi, "select sum(pus) as totjlhpus0103 from keluarga where kodekel='0103'");
						$jlhtotpus0103=pg_fetch_array($totpus0103); 
						$jumlahpus0103=$jlhtotpus0103[totjlhpus0103];
						$totjumlahpus0103=number_format($jumlahpus0103,0,",",".");
					echo "$totjumlahpus0103";
 } ?>