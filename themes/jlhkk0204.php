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
	  
		  
					$totkk0204 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0204 from keluarga where kodekel='0204'");
						$jlhtotkk0204=pg_fetch_array($totkk0204); 
						$jumlahkk0204=$jlhtotkk0204[totjlhkk0204];
						$totjumlahkk0204=number_format($jumlahkk0204,0,",",".");
					echo "$totjumlahkk0204";
 } ?>