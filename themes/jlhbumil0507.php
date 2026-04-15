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
	  
		  
					$totbumil0507 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0507 from keluarga where kodekel='0507'");
						$jlhtotbumil0507=pg_fetch_array($totbumil0507); 
						$jumlahbumil0507=$jlhtotbumil0507[totjlhbumil0507];
						$totjumlahbumil0507=number_format($jumlahbumil0507,0,",",".");
					echo "$totjumlahbumil0507";
 } ?>