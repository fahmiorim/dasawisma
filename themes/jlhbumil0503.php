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
	  
		  
					$totbumil0503 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0503 from keluarga where kodekel='0503'");
						$jlhtotbumil0503=pg_fetch_array($totbumil0503); 
						$jumlahbumil0503=$jlhtotbumil0503[totjlhbumil0503];
						$totjumlahbumil0503=number_format($jumlahbumil0503,0,",",".");
					echo "$totjumlahbumil0503";
 } ?>