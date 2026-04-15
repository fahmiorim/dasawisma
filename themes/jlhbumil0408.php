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
	  
		  
					$totbumil0408 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0408 from keluarga where kodekel='0408'");
						$jlhtotbumil0408=pg_fetch_array($totbumil0408); 
						$jumlahbumil0408=$jlhtotbumil0408[totjlhbumil0408];
						$totjumlahbumil0408=number_format($jumlahbumil0408,0,",",".");
					echo "$totjumlahbumil0408";
 } ?>