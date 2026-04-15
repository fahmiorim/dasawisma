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
	  
		  
					$totkk0302 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0302 from keluarga where kodekel='0302'");
						$jlhtotkk0302=pg_fetch_array($totkk0302); 
						$jumlahkk0302=$jlhtotkk0302[totjlhkk0302];
						$totjumlahkk0302=number_format($jumlahkk0302,0,",",".");
					echo "$totjumlahkk0302";
 } ?>