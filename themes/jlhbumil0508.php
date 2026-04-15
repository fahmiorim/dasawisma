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
	  
		  
					$totbumil0508 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0508 from keluarga where kodekel='0508'");
						$jlhtotbumil0508=pg_fetch_array($totbumil0508); 
						$jumlahbumil0508=$jlhtotbumil0508[totjlhbumil0508];
						$totjumlahbumil0508=number_format($jumlahbumil0508,0,",",".");
					echo "$totjumlahbumil0508";
 } ?>