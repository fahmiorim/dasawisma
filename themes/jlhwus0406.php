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
	  
		  
					$totwus0406 =pg_query($koneksi, "select sum(wus) as totjlhwus0406 from keluarga where kodekel='0406'");
						$jlhtotwus0406=pg_fetch_array($totwus0406); 
						$jumlahwus0406=$jlhtotwus0406[totjlhwus0406];
						$totjumlahwus0406=number_format($jumlahwus0406,0,",",".");
					echo "$totjumlahwus0406";
 } ?>