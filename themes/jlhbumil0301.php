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
	  
		  
					$totbumil0301 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0301 from keluarga where kodekel='0301'");
						$jlhtotbumil0301=pg_fetch_array($totbumil0301); 
						$jumlahbumil0301=$jlhtotbumil0301[totjlhbumil0301];
						$totjumlahbumil0301=number_format($jumlahbumil0301,0,",",".");
					echo "$totjumlahbumil0301";
 } ?>