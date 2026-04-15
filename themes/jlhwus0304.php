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
	  
		  
					$totwus0304 =pg_query($koneksi, "select sum(wus) as totjlhwus0304 from keluarga where kodekel='0304'");
						$jlhtotwus0304=pg_fetch_array($totwus0304); 
						$jumlahwus0304=$jlhtotwus0304[totjlhwus0304];
						$totjumlahwus0304=number_format($jumlahwus0304,0,",",".");
					echo "$totjumlahwus0304";
 } ?>