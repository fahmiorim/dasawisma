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
	  
		  
					$totkk0205 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0205 from keluarga where kodekel='0205'");
						$jlhtotkk0205=pg_fetch_array($totkk0205); 
						$jumlahkk0205=$jlhtotkk0205[totjlhkk0205];
						$totjumlahkk0205=number_format($jumlahkk0205,0,",",".");
					echo "$totjumlahkk0205";
 } ?>