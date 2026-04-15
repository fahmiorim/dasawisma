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
	  
		  
					$totkk0507 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0507 from keluarga where kodekel='0507'");
						$jlhtotkk0507=pg_fetch_array($totkk0507); 
						$jumlahkk0507=$jlhtotkk0507[totjlhkk0507];
						$totjumlahkk0507=number_format($jumlahkk0507,0,",",".");
					echo "$totjumlahkk0507";
 } ?>