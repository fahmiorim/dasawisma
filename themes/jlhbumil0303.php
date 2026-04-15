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
	  
		  
					$totbumil0303 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0303 from keluarga where kodekel='0303'");
						$jlhtotbumil0303=pg_fetch_array($totbumil0303); 
						$jumlahbumil0303=$jlhtotbumil0303[totjlhbumil0303];
						$totjumlahbumil0303=number_format($jumlahbumil0303,0,",",".");
					echo "$totjumlahbumil0303";
 } ?>