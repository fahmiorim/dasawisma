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
	  
		  
					$totbumil0203 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0203 from keluarga where kodekel='0203'");
						$jlhtotbumil0203=pg_fetch_array($totbumil0203); 
						$jumlahbumil0203=$jlhtotbumil0203[totjlhbumil0203];
						$totjumlahbumil0203=number_format($jumlahbumil0203,0,",",".");
					echo "$totjumlahbumil0203";
 } ?>