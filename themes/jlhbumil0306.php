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
	  
		  
					$totbumil0306 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0306 from keluarga where kodekel='0306'");
						$jlhtotbumil0306=pg_fetch_array($totbumil0306); 
						$jumlahbumil0306=$jlhtotbumil0306[totjlhbumil0306];
						$totjumlahbumil0306=number_format($jumlahbumil0306,0,",",".");
					echo "$totjumlahbumil0306";
 } ?>