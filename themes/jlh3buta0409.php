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
	  
		  
					$totbuta30409 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30409 from keluarga where kodekel='0409'");
						$jlhtotbuta30409=pg_fetch_array($totbuta30409); 
						$jumlahbuta30409=$jlhtotbuta30409[totjlhbuta30409];
						$totjumlahbuta30409=number_format($jumlahbuta30409,0,",",".");
					echo "$totjumlahbuta30409";
 } ?>