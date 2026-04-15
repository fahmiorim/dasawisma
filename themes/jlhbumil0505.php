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
	  
		  
					$totbumil0505 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0505 from keluarga where kodekel='0505'");
						$jlhtotbumil0505=pg_fetch_array($totbumil0505); 
						$jumlahbumil0505=$jlhtotbumil0505[totjlhbumil0505];
						$totjumlahbumil0505=number_format($jumlahbumil0505,0,",",".");
					echo "$totjumlahbumil0505";
 } ?>