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
	  
		  
					$totbumil0101 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0101 from keluarga where kodekel='0101'");
						$jlhtotbumil0101=pg_fetch_array($totbumil0101); 
						$jumlahbumil0101=$jlhtotbumil0101[totjlhbumil0101];
						$totjumlahbumil0101=number_format($jumlahbumil0101,0,",",".");
					echo "$totjumlahbumil0101";
 } ?>