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
	  
		  
					$totbumil0207 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0207 from keluarga where kodekel='0207'");
						$jlhtotbumil0207=pg_fetch_array($totbumil0207); 
						$jumlahbumil0207=$jlhtotbumil0207[totjlhbumil0207];
						$totjumlahbumil0207=number_format($jumlahbumil0207,0,",",".");
					echo "$totjumlahbumil0207";
 } ?>