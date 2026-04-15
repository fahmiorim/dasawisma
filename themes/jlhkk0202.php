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
	  
		  
					$totkk0202 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0202 from keluarga where kodekel='0202'");
						$jlhtotkk0202=pg_fetch_array($totkk0202); 
						$jumlahkk0202=$jlhtotkk0202[totjlhkk0202];
						$totjumlahkk0202=number_format($jumlahkk0202,0,",",".");
					echo "$totjumlahkk0202";
 } ?>