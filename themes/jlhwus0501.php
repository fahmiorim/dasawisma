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
	  
		  
					$totwus0501 =pg_query($koneksi, "select sum(wus) as totjlhwus0501 from keluarga where kodekel='0501'");
						$jlhtotwus0501=pg_fetch_array($totwus0501); 
						$jumlahwus0501=$jlhtotwus0501[totjlhwus0501];
						$totjumlahwus0501=number_format($jumlahwus0501,0,",",".");
					echo "$totjumlahwus0501";
 } ?>