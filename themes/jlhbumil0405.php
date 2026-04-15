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
	  
		  
					$totbumil0405 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0405 from keluarga where kodekel='0405'");
						$jlhtotbumil0405=pg_fetch_array($totbumil0405); 
						$jumlahbumil0405=$jlhtotbumil0405[totjlhbumil0405];
						$totjumlahbumil0405=number_format($jumlahbumil0405,0,",",".");
					echo "$totjumlahbumil0405";
 } ?>