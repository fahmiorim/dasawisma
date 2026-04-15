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
	  
		  
					$totwus0201 =pg_query($koneksi, "select sum(wus) as totjlhwus0201 from keluarga where kodekel='0201'");
						$jlhtotwus0201=pg_fetch_array($totwus0201); 
						$jumlahwus0201=$jlhtotwus0201[totjlhwus0201];
						$totjumlahwus0201=number_format($jumlahwus0201,0,",",".");
					echo "$totjumlahwus0201";
 } ?>