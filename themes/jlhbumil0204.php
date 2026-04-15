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
	  
		  
					$totbumil0204 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0204 from keluarga where kodekel='0204'");
						$jlhtotbumil0204=pg_fetch_array($totbumil0204); 
						$jumlahbumil0204=$jlhtotbumil0204[totjlhbumil0204];
						$totjumlahbumil0204=number_format($jumlahbumil0204,0,",",".");
					echo "$totjumlahbumil0204";
 } ?>