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
	  
		  
					$totwus0502 =pg_query($koneksi, "select sum(wus) as totjlhwus0502 from keluarga where kodekel='0502'");
						$jlhtotwus0502=pg_fetch_array($totwus0502); 
						$jumlahwus0502=$jlhtotwus0502[totjlhwus0502];
						$totjumlahwus0502=number_format($jumlahwus0502,0,",",".");
					echo "$totjumlahwus0502";
 } ?>