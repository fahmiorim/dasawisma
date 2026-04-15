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
	  
		  
					$totbumil0205 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0205 from keluarga where kodekel='0205'");
						$jlhtotbumil0205=pg_fetch_array($totbumil0205); 
						$jumlahbumil0205=$jlhtotbumil0205[totjlhbumil0205];
						$totjumlahbumil0205=number_format($jumlahbumil0205,0,",",".");
					echo "$totjumlahbumil0205";
 } ?>