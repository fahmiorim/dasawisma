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
	  
		  
					$totkk0508 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0508 from keluarga where kodekel='0508'");
						$jlhtotkk0508=pg_fetch_array($totkk0508); 
						$jumlahkk0508=$jlhtotkk0508[totjlhkk0508];
						$totjumlahkk0508=number_format($jumlahkk0508,0,",",".");
					echo "$totjumlahkk0508";
 } ?>