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
	  
		  
					$totbumil0302 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0302 from keluarga where kodekel='0302'");
						$jlhtotbumil0302=pg_fetch_array($totbumil0302); 
						$jumlahbumil0302=$jlhtotbumil0302[totjlhbumil0302];
						$totjumlahbumil0302=number_format($jumlahbumil0302,0,",",".");
					echo "$totjumlahbumil0302";
 } ?>