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
	  
		  
					$totbumil0409 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0409 from keluarga where kodekel='0409'");
						$jlhtotbumil0409=pg_fetch_array($totbumil0409); 
						$jumlahbumil0409=$jlhtotbumil0409[totjlhbumil0409];
						$totjumlahbumil0409=number_format($jumlahbumil0409,0,",",".");
					echo "$totjumlahbumil0409";
 } ?>