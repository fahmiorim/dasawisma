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
	  
		  
					$totbumil0102 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0102 from keluarga where kodekel='0102'");
						$jlhtotbumil0102=pg_fetch_array($totbumil0102); 
						$jumlahbumil0102=$jlhtotbumil0102[totjlhbumil0102];
						$totjumlahbumil0102=number_format($jumlahbumil0102,0,",",".");
					echo "$totjumlahbumil0102";
 } ?>