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
	  
		  
					$totbumil0407 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0407 from keluarga where kodekel='0407'");
						$jlhtotbumil0407=pg_fetch_array($totbumil0407); 
						$jumlahbumil0407=$jlhtotbumil0407[totjlhbumil0407];
						$totjumlahbumil0407=number_format($jumlahbumil0407,0,",",".");
					echo "$totjumlahbumil0407";
 } ?>