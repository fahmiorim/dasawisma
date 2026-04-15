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
	  
		  
					$totkk0404 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0404 from keluarga where kodekel='0404'");
						$jlhtotkk0404=pg_fetch_array($totkk0404); 
						$jumlahkk0404=$jlhtotkk0404[totjlhkk0404];
						$totjumlahkk0404=number_format($jumlahkk0404,0,",",".");
					echo "$totjumlahkk0404";
 } ?>