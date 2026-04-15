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
	  
		  
					$totwus0104 =pg_query($koneksi, "select sum(wus) as totjlhwus0104 from keluarga where kodekel='0104'");
						$jlhtotwus0104=pg_fetch_array($totwus0104); 
						$jumlahwus0104=$jlhtotwus0104[totjlhwus0104];
						$totjumlahwus0104=number_format($jumlahwus0104,0,",",".");
					echo "$totjumlahwus0104";
 } ?>