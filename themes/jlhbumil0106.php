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
	  
		  
					$totbumil0106 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0106 from keluarga where kodekel='0106'");
						$jlhtotbumil0106=pg_fetch_array($totbumil0106); 
						$jumlahbumil0106=$jlhtotbumil0106[totjlhbumil0106];
						$totjumlahbumil0106=number_format($jumlahbumil0106,0,",",".");
					echo "$totjumlahbumil0106";
 } ?>