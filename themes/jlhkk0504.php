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
	  
		  
					$totkk0504 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0504 from keluarga where kodekel='0504'");
						$jlhtotkk0504=pg_fetch_array($totkk0504); 
						$jumlahkk0504=$jlhtotkk0504[totjlhkk0504];
						$totjumlahkk0504=number_format($jumlahkk0504,0,",",".");
					echo "$totjumlahkk0504";
 } ?>