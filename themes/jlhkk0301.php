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
	  
		  
					$totkk0301 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0301 from keluarga where kodekel='0301'");
						$jlhtotkk0301=pg_fetch_array($totkk0301); 
						$jumlahkk0301=$jlhtotkk0301[totjlhkk0301];
						$totjumlahkk0301=number_format($jumlahkk0301,0,",",".");
					echo "$totjumlahkk0301";
 } ?>