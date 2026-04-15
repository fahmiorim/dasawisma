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
	  
		  
					$totwus0206 =pg_query($koneksi, "select sum(wus) as totjlhwus0206 from keluarga where kodekel='0206'");
						$jlhtotwus0206=pg_fetch_array($totwus0206); 
						$jumlahwus0206=$jlhtotwus0206[totjlhwus0206];
						$totjumlahwus0206=number_format($jumlahwus0206,0,",",".");
					echo "$totjumlahwus0206";
 } ?>