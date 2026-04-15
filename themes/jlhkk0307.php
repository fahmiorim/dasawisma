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
	  
		  
					$totkk0307 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0307 from keluarga where kodekel='0307'");
						$jlhtotkk0307=pg_fetch_array($totkk0307); 
						$jumlahkk0307=$jlhtotkk0307[totjlhkk0307];
						$totjumlahkk0307=number_format($jumlahkk0307,0,",",".");
					echo "$totjumlahkk0307";
 } ?>