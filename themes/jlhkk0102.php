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
	  
		  
					$totkk0102 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0102 from keluarga where kodekel='0102'");
						$jlhtotkk0102=pg_fetch_array($totkk0102); 
						$jumlahkk0102=$jlhtotkk0102[totjlhkk0102];
						$totjumlahkk0102=number_format($jumlahkk0102,0,",",".");
					echo "$totjumlahkk0102";
 } ?>