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
	  
		  
					$totbumil0307 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0307 from keluarga where kodekel='0307'");
						$jlhtotbumil0307=pg_fetch_array($totbumil0307); 
						$jumlahbumil0307=$jlhtotbumil0307[totjlhbumil0307];
						$totjumlahbumil0307=number_format($jumlahbumil0307,0,",",".");
					echo "$totjumlahbumil0307";
 } ?>