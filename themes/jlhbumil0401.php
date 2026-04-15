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
	  
		  
					$totbumil0401 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0401 from keluarga where kodekel='0401'");
						$jlhtotbumil0401=pg_fetch_array($totbumil0401); 
						$jumlahbumil0401=$jlhtotbumil0401[totjlhbumil0401];
						$totjumlahbumil0401=number_format($jumlahbumil0401,0,",",".");
					echo "$totjumlahbumil0401";
 } ?>