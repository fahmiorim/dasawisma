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
	  
		  
					$totkk0502 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0502 from keluarga where kodekel='0502'");
						$jlhtotkk0502=pg_fetch_array($totkk0502); 
						$jumlahkk0502=$jlhtotkk0502[totjlhkk0502];
						$totjumlahkk0502=number_format($jumlahkk0502,0,",",".");
					echo "$totjumlahkk0502";
 } ?>