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
	  
		  
					$totkk0101 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0101 from keluarga where kodekel='0101'");
						$jlhtotkk0101=pg_fetch_array($totkk0101); 
						$jumlahkk0101=$jlhtotkk0101[totjlhkk0101];
						$totjumlahkk0101=number_format($jumlahkk0101,0,",",".");
					echo "$totjumlahkk0101";
 } ?>