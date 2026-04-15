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
	  
		  
					$totbumil0404 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0404 from keluarga where kodekel='0404'");
						$jlhtotbumil0404=pg_fetch_array($totbumil0404); 
						$jumlahbumil0404=$jlhtotbumil0404[totjlhbumil0404];
						$totjumlahbumil0404=number_format($jumlahbumil0404,0,",",".");
					echo "$totjumlahbumil0404";
 } ?>