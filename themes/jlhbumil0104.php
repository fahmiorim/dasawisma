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
	  
		  
					$totbumil0104 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0104 from keluarga where kodekel='0104'");
						$jlhtotbumil0104=pg_fetch_array($totbumil0104); 
						$jumlahbumil0104=$jlhtotbumil0104[totjlhbumil0104];
						$totjumlahbumil0104=number_format($jumlahbumil0104,0,",",".");
					echo "$totjumlahbumil0104";
 } ?>