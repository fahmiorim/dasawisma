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
	  
		  
					$totwus0409 =pg_query($koneksi, "select sum(wus) as totjlhwus0409 from keluarga where kodekel='0409'");
						$jlhtotwus0409=pg_fetch_array($totwus0409); 
						$jumlahwus0409=$jlhtotwus0409[totjlhwus0409];
						$totjumlahwus0409=number_format($jumlahwus0409,0,",",".");
					echo "$totjumlahwus0409";
 } ?>