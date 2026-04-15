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
	  
		  
					$totkk0506 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0506 from keluarga where kodekel='0506'");
						$jlhtotkk0506=pg_fetch_array($totkk0506); 
						$jumlahkk0506=$jlhtotkk0506[totjlhkk0506];
						$totjumlahkk0506=number_format($jumlahkk0506,0,",",".");
					echo "$totjumlahkk0506";
 } ?>