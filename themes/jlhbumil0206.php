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
	  
		  
					$totbumil0206 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0206 from keluarga where kodekel='0206'");
						$jlhtotbumil0206=pg_fetch_array($totbumil0206); 
						$jumlahbumil0206=$jlhtotbumil0206[totjlhbumil0206];
						$totjumlahbumil0206=number_format($jumlahbumil0206,0,",",".");
					echo "$totjumlahbumil0206";
 } ?>