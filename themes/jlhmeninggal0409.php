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
	  
		  
			$totmeninggal0409 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0409 from kehamilan where kodekel='0409'");
						$jlhtotmeninggal0409=pg_fetch_array($totmeninggal0409); 
						$jumlahmeninggal0409=$jlhtotmeninggal0409[totjlhmeninggal0409];
						$totjumlahmeninggal0409=number_format($jumlahmeninggal0409,0,",",".");
					echo "$totjumlahmeninggal0409";
 } ?>