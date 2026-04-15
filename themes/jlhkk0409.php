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
	  
		  
					$totkk0409 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0409 from keluarga where kodekel='0409'");
						$jlhtotkk0409=pg_fetch_array($totkk0409); 
						$jumlahkk0409=$jlhtotkk0409[totjlhkk0409];
						$totjumlahkk0409=number_format($jumlahkk0409,0,",",".");
					echo "$totjumlahkk0409";
 } ?>