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
	  
		  
					$totkk0306 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0306 from keluarga where kodekel='0306'");
						$jlhtotkk0306=pg_fetch_array($totkk0306); 
						$jumlahkk0306=$jlhtotkk0306[totjlhkk0306];
						$totjumlahkk0306=number_format($jumlahkk0306,0,",",".");
					echo "$totjumlahkk0306";
 } ?>