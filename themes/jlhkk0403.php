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
	  
		  
					$totkk0403 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0403 from keluarga where kodekel='0403'");
						$jlhtotkk0403=pg_fetch_array($totkk0403); 
						$jumlahkk0403=$jlhtotkk0403[totjlhkk0403];
						$totjumlahkk0403=number_format($jumlahkk0403,0,",",".");
					echo "$totjumlahkk0403";
 } ?>