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
	  
		  
					$totlansia0409 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0409 from keluarga where kodekel='0409'");
						$jlhtotlansia0409=pg_fetch_array($totlansia0409); 
						$jumlahlansia0409=$jlhtotlansia0409[totjlhlansia0409];
						$totjumlahlansia0409=number_format($jumlahlansia0409,0,",",".");
					echo "$totjumlahlansia0409";
 } ?>