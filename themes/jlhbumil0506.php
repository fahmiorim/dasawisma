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
	  
		  
					$totbumil0506 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0506 from keluarga where kodekel='0506'");
						$jlhtotbumil0506=pg_fetch_array($totbumil0506); 
						$jumlahbumil0506=$jlhtotbumil0506[totjlhbumil0506];
						$totjumlahbumil0506=number_format($jumlahbumil0506,0,",",".");
					echo "$totjumlahbumil0506";
 } ?>