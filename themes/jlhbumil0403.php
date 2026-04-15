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
	  
		  
					$totbumil0403 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0403 from keluarga where kodekel='0403'");
						$jlhtotbumil0403=pg_fetch_array($totbumil0403); 
						$jumlahbumil0403=$jlhtotbumil0403[totjlhbumil0403];
						$totjumlahbumil0403=number_format($jumlahbumil0403,0,",",".");
					echo "$totjumlahbumil0403";
 } ?>