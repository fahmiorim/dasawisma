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
	  
		  
					$totbumil0504 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0504 from keluarga where kodekel='0504'");
						$jlhtotbumil0504=pg_fetch_array($totbumil0504); 
						$jumlahbumil0504=$jlhtotbumil0504[totjlhbumil0504];
						$totjumlahbumil0504=number_format($jumlahbumil0504,0,",",".");
					echo "$totjumlahbumil0504";
 } ?>