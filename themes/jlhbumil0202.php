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
	  
		  
					$totbumil0202 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0202 from keluarga where kodekel='0202'");
						$jlhtotbumil0202=pg_fetch_array($totbumil0202); 
						$jumlahbumil0202=$jlhtotbumil0202[totjlhbumil0202];
						$totjumlahbumil0202=number_format($jumlahbumil0202,0,",",".");
					echo "$totjumlahbumil0202";
 } ?>