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
	  
		  
					$totbumil0304 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0304 from keluarga where kodekel='0304'");
						$jlhtotbumil0304=pg_fetch_array($totbumil0304); 
						$jumlahbumil0304=$jlhtotbumil0304[totjlhbumil0304];
						$totjumlahbumil0304=number_format($jumlahbumil0304,0,",",".");
					echo "$totjumlahbumil0304";
 } ?>