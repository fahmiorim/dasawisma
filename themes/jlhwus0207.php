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
	  
		  
					$totwus0207 =pg_query($koneksi, "select sum(wus) as totjlhwus0207 from keluarga where kodekel='0207'");
						$jlhtotwus0207=pg_fetch_array($totwus0207); 
						$jumlahwus0207=$jlhtotwus0207[totjlhwus0207];
						$totjumlahwus0207=number_format($jumlahwus0207,0,",",".");
					echo "$totjumlahwus0207";
 } ?>