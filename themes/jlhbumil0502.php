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
	  
		  
					$totbumil0502 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0502 from keluarga where kodekel='0502'");
						$jlhtotbumil0502=pg_fetch_array($totbumil0502); 
						$jumlahbumil0502=$jlhtotbumil0502[totjlhbumil0502];
						$totjumlahbumil0502=number_format($jumlahbumil0502,0,",",".");
					echo "$totjumlahbumil0502";
 } ?>