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
	  
		  
					$totwus0303 =pg_query($koneksi, "select sum(wus) as totjlhwus0303 from keluarga where kodekel='0303'");
						$jlhtotwus0303=pg_fetch_array($totwus0303); 
						$jumlahwus0303=$jlhtotwus0303[totjlhwus0303];
						$totjumlahwus0303=number_format($jumlahwus0303,0,",",".");
					echo "$totjumlahwus0303";
 } ?>